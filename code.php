<?php
$explanation = 'Your explanation will appear here.';
$language = $_POST['language'] ?? '';
$code = $_POST['code'] ?? '';
$env = is_file(__DIR__ . '/.env') ? parse_ini_file(__DIR__ . '/.env') ?: [] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && trim($language) !== '' && trim($code) !== '') {
    $apiKey = $env['GEMINI_API_KEY'] ?? '';
    if ($apiKey === '') {
        $explanation = 'Add GEMINI_API_KEY to your .env file.';
    } else {
        $prompt = "This is the code in {$language}. Explain this code to me in a simple and detailed way:\n\n{$code}";
        $data = json_encode(['contents' => [['parts' => [['text' => $prompt]]]]]);
        $ch = curl_init('https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=' . $apiKey);
        curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_POST => true, CURLOPT_HTTPHEADER => ['Content-Type: application/json'], CURLOPT_POSTFIELDS => $data]);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($response === false) {
            $explanation = $error ?: 'Request failed.';
        } else {
            $json = json_decode($response, true);
            if (!empty($json['error']['message'])) {
                $explanation = 'API error (' . $status . '): ' . $json['error']['message'];
            } else {
                $explanation = $json['candidates'][0]['content']['parts'][0]['text'] ?? 'No response received.';
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Code Explanation Helper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Images/Favicon.png">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <?php include 'navbar.html'; ?>

    <div class="main code-page">
        <form class="code-row" method="post">
            <div class="code-col">
                <div class="panel h-100">
                    <input class="form-control mb-2" name="language" placeholder="Which programming language is it?" value="<?= htmlspecialchars($language, ENT_QUOTES) ?>">
                    <textarea class="form-control code-box mb-2" name="code" placeholder="Paste your code here"><?= htmlspecialchars($code, ENT_QUOTES) ?></textarea>
                    <button class="btn btn-danger" type="reset">Clear</button>
                    <button class="btn btn-success" type="submit">Submit</button>

                </div>
            </div>
            <div class="code-col">
                <div class="panel h-100">
                    <textarea class="form-control explain-box" readonly><?= htmlspecialchars($explanation, ENT_QUOTES) ?></textarea>
                </div>
            </div>
        </form>
    </div>
</body>
</html>