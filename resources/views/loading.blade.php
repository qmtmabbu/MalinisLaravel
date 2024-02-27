<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/logo.png" type="image/x-icon">
    <title>Malinis</title>
    <style>
        /* CSS for the loading bar */
        #progress-container {
            width: 100%;
            height: 30px;
            background-color: #1a1a1a;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        #progress-bar {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .btnProceed {
            background-color: #4caf50;
            border-radius: 5px;
            opacity: 0;
        }

        /* CSS for the packet sniffing visualization */
        #sniffing-logs {
            font-family: 'Courier New', monospace;
            padding: 20px;
            background-color: #1a1a1a;
            border-radius: 5px;
            color: #cfcfcf;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        #sniffing-logs.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* CSS for individual log items */
        .log-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .log-item.show {
            opacity: 1;
            transform: translateY(0);
        }

        #results {
            color: #cfcfcf;
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
</head>

<body>
    <div id="progress-container">
        <div id="progress-bar"></div>
    </div>
    <div id="results">
        <h2>Processing Results: 0%</h2>

    </div>
    <div id="sniffing-logs">
        <h2>Packet Sniffing Logs:</h2>
        <ul id="logs-list"></ul>
    </div>
    <br>
    <button id="btnProceed1" class="btn btnProceed"
        onclick='window.location = "/detections?fromLoading=true" '>Proceed</button>


    <script>
        // JavaScript for the loading bar
        const progressBar = document.getElementById('progress-bar');
        var userID = <?php echo $userID; ?>

        async function fetchLogs() {
            const maxRetries = 3; // Maximum number of retries
            const retryDelay = 1000; // Delay in milliseconds between retries
            let retries = 0;

            while (retries < maxRetries) {
                try {
                    const timestamp = Date.now(); // Generate a unique timestamp
                    const response = await fetch(`http://192.168.137.215:5000/logs/${userID}.txt?cache=${timestamp}`);

                    if (response.ok) {
                        const data = await response.text();
                        const logs = data.split('\n').filter(line => line.trim() !==
                        ''); // Split logs by newline and remove empty lines
                        return logs;
                    } else if (response.status === 404) {
                        console.error('Logs not found (404)');
                    } else {
                        throw new Error(`Unexpected response status: ${response.status}`);
                    }
                } catch (error) {
                    console.error('Error fetching logs:', error);
                }

                retries++;
                if (retries < maxRetries) {
                    console.log(`Retrying... Attempt ${retries}`);
                    await new Promise(resolve => setTimeout(resolve, retryDelay));
                }
            }

            console.error('Max retries reached');
            return [];
        }

        async function simulateProgress() {
            let width = 0;
            const logs = await fetchLogs();
            if (!logs) {
                logs = await fetchLogs();
            }
            const results = document.getElementById("results");
            const logsList = document.getElementById('logs-list');
            const btn = document.getElementById('btnProceed1');

            const interval = setInterval(() => {
                width += Math.random() * 10;
                if (width >= 100) {
                    clearInterval(interval);
                    results.innerHTML = "<h2>Processing Results: 100%</h2>";
                    // Show packet sniffing logs after progress completion
                    document.getElementById('sniffing-logs').classList.add('show');
                    // setTimeout(() => {
                    //     window.location = "/detections?fromLoading=true";
                    // }, 2500);
                    btn.style.opacity = "100%";
                } else {
                    progressBar.style.width = width + '%';
                    results.innerHTML = "<h2>Processing Results: " + width.toFixed(2) + "%</h2>";
                    // Generate logs
                    // const log = logs[Math.floor(Math.random() * logs.length)]; // Pick a random log
                    const log = logs[logs.length - 1]; // Pick a random log
                    if (log) {
                        const li = document.createElement('li');
                        li.textContent = log;
                        li.classList.add('log-item');
                        logsList.appendChild(li);
                        // Trigger animation by adding show class
                        setTimeout(() => {
                            li.classList.add('show');
                        }, 10);
                    }
                }
            }, 300);
        }

        // Start the progress simulation
        simulateProgress();
    </script>
</body>

</html>
