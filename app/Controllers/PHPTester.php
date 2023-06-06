<?php
if (isset($_FILES['phpcheck_req'])) {
    $result = analyzePHPFile($_FILES['phpcheck_req']['tmp_name']);
    header('Content-Type: application/json');
    echo $result;
    exit;
}

// Function to analyze a PHP file for possible vulnerabilities
function analyzePHPFile($filePath)
{
    // Check if the file exists
    if (!file_exists($filePath)) {
        $result = [
            'error' => 'File not found'
        ];
        return json_encode($result);
    }

    // Read the PHP file
    $fileContent = file_get_contents($filePath);

    // Check for potential vulnerabilities
    $vulnerabilities = [];

    // Look for echo statements without proper sanitization
    $pattern = '/echo\s+(["\']).*?\1\s*;/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential XSS vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line contains an echo statement that outputs user-supplied data without proper HTML encoding, which could lead to cross-site scripting (XSS) attacks.',
                'threat_level' => 'High Risk',
                'solution' => 'To fix this vulnerability, you should sanitize user input using appropriate functions such as htmlspecialchars() or htmlentities() to encode the output properly.'
            ];
        }
    }

    // Look for print statements without proper sanitization
    $pattern = '/print\s+(["\']).*?\1\s*;/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential XSS vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line contains a print statement that outputs user-supplied data without proper HTML encoding, which could lead to cross-site scripting (XSS) attacks.',
                'threat_level' => 'Low Risk',
                'solution' => 'To fix this vulnerability, you should sanitize user input using appropriate functions such as htmlspecialchars() or htmlentities() to encode the output properly.'
            ];
        }
    }

    // Look for direct output of user input without proper sanitization
    $pattern = '/\$_(GET|POST|REQUEST|COOKIE)\[[\'"].*?[\'"]\]\s*;/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential XSS vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line directly outputs user-supplied data without proper HTML encoding, which could lead to cross-site scripting (XSS) attacks.',
                'threat_level' => 'Neutral Risk',
                'solution' => 'To fix this vulnerability, you should sanitize user input using appropriate functions such as htmlspecialchars() or htmlentities() to encode the output properly.'
            ];
        }
    }

    // Look for assignments of user input to variables without sanitization
    $pattern = '/\$\w+\s*=\s*\$_(GET|POST|REQUEST|COOKIE)\[[\'"].*?[\'"]\]\s*;/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential XSS vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line assigns user-supplied data to a variable without proper HTML encoding, which could lead to cross-site scripting (XSS) attacks.',
                'threat_level' => 'Extreme Low Risk',
                'solution' => 'To fix this vulnerability, you should sanitize user input using appropriate functions such as htmlspecialchars() or htmlentities() to encode the output properly.'
            ];
        }
    }

    // Look for JavaScript event handlers without proper sanitization
    $pattern = '/\s(on\w+)\s*=\s*(["\']).*?\2/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential XSS vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line assigns user-supplied data to a JavaScript event handler without proper sanitization, which could lead to cross-site scripting (XSS) attacks.',
                'threat_level' => 'Extreme Risk',
                'solution' => 'To fix this vulnerability, you should sanitize user input when assigning it to JavaScript event handlers to prevent XSS attacks. Use functions like JavaScript escape() or encodeURI() for proper encoding.'
            ];
        }
    }

    // Look for SQL injection vulnerabilities
    $pattern = '/mysql_query\s*\(\s*(["\']).*?\1\s*\)/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential SQL injection vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line contains a MySQL query that concatenates user-supplied data without proper parameterization or input validation, which could lead to SQL injection attacks.',
                'threat_level' => 'High Risk',
                'solution' => 'To fix this vulnerability, you should use prepared statements or parameterized queries with placeholders to ensure proper escaping and validation of user input.'
            ];
        }
    }

    // Look for command injection vulnerabilities
    $pattern = '/(`|exec\(|shell_exec\(|system\(|passthru\(|popen\(|proc_open\(|pcntl_exec\(|assert\(|preg_replace\(|create_function\(|include\(|include_once\(|require\(|require_once\(|eval\(|\$\{\s*\w+\s*\}\s*\()[^;]+/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential command injection vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line executes a command using user-supplied data without proper input validation or command parameterization, which could lead to command injection attacks.',
                'threat_level' => 'Critical Risk',
                'solution' => 'To fix this vulnerability, you should avoid executing commands with user-supplied data directly. Use secure alternatives or sanitize and validate the input thoroughly before passing it to any command execution functions.'
            ];
        }
    }

    // Look for file inclusion vulnerabilities
    $pattern = '/include\s*\(\s*(["\']).*?\1\s*\)/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential file inclusion vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line includes a file based on user-supplied data without proper input validation, which could lead to file inclusion attacks.',
                'threat_level' => 'High Risk',
                'solution' => 'To fix this vulnerability, you should avoid including files based on user input directly. Validate and sanitize the user input before using it in file inclusion functions. Limit the possible inclusion paths to a known set of safe options.'
            ];
        }
    }

    // Look for potential Remote File Inclusion (RFI) vulnerabilities
    $pattern = '/\binclude\s*\(\s*(["\']).*?\1\s*\)/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential Remote File Inclusion (RFI) vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line includes a file based on user-supplied data without proper input validation, which could lead to remote file inclusion attacks.',
                'threat_level' => 'High Risk',
                'solution' => 'To fix this vulnerability, you should avoid including files based on user input directly. Validate and sanitize the user input before using it in file inclusion functions. Limit the possible inclusion paths to a known set of safe options.'
            ];
        }
    }

    // Look for potential Cross-Site Request Forgery (CSRF) vulnerabilities
    $pattern = '/\b(curl_exec|file_get_contents)\s*\(\s*\$_(GET|POST|REQUEST|COOKIE)\[[\'"].*?[\'"]\]\s*\)/si';
    if (preg_match_all($pattern, $fileContent, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = getLineNumber($fileContent, $match[1]);
            $vulnerabilities[] = [
                'message' => "Potential Cross-Site Request Forgery (CSRF) vulnerability in line $lineNumber: <pre class='bg-dark p-3' style='color:whitesmoke;'><code>".htmlspecialchars($match[0], ENT_QUOTES, 'UTF-8')."</code></pre>",
                'explanation' => 'This line makes a request to an external resource using user-supplied data without proper input validation or protection against CSRF attacks.',
                'threat_level' => 'Medium Risk',
                'solution' => 'To fix this vulnerability, you should implement CSRF protection mechanisms such as using CSRF tokens, checking referrer headers, and validating the origin of requests.'
            ];
        }
    }

    // Prepare the result
    $result = [
        'success' => true,
        'file' => $filePath,
        'vulnerabilities' => $vulnerabilities
    ];

    return json_encode($result);
}

// Function to get the line number of a match in a file
function getLineNumber($fileContent, $offset)
{
    $lines = explode("\n", $fileContent);
    $lineNumber = 1;
    $charCount = 0;

    foreach ($lines as $line) {
        $charCount += strlen($line) + 1; // +1 for the newline character
        if ($charCount > $offset) {
            break;
        }
        $lineNumber++;
    }

    return $lineNumber;
}
?>