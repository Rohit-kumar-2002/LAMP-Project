<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['protocol']) && isset($_POST['option'])) {
        $protocol = $_POST['protocol'];
        $option = $_POST['option'];

        if ($protocol == 'udp') {
            $filename = '';
            if ($option == 'Timestamp') {
                $filename = 'packets/udptimestamp';
            } elseif ($option === 'ALL') {
                $filename = 'packets/udpall';
            } elseif ($option === 'Source MAC Address') {
                $filename = 'packets/udpsourcemac';
            } elseif ($option === 'Destination MAC Address') {
                $filename = 'packets/udpdestinationmac';
            } elseif ($option === 'EtherType') {
                $filename = 'packets/udpethertype';
            } elseif ($option === 'Total packet length') {
                $filename = 'packets/udppacketlength';
            } elseif ($option === 'Source IP address') {
                $filename = 'packets/udpsourceip';
            } elseif ($option === 'Source port') {
                $filename = 'packets/udpsourceport';
            } elseif ($option === 'Destination IP address') {
                $filename = 'packets/udpdestinationip';
            } elseif ($option === 'Destination port') {
                $filename = 'packets/udpdestinationport';
            } elseif ($option === 'Protocol') {
                $filename = 'packets/udpprotocol';
            } elseif ($option === 'Payload length') {
                $filename = 'packets/udppayloadlength';
            }

            if (!empty($filename)) {
                $data = file_get_contents($filename);
                if ($data !== false) {
                    $lines = explode("\n", $data);
                    echo '<!DOCTYPE html>
<html>
<head>
<title>Form Submission Result</title>
<style>
/* Your existing CSS styles here */
body {
    background-color: #4a5568;
}
.result-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}
table {
    border-collapse: collapse;
    margin-top: 10px;
    width: 90vw; /* Set the table width to 90% of the viewport width */
}
th {
    padding: 10px;
    border: 1px solid #333333;
    background-color: #0D9488; /* Teal-700 */
    color: #FFFFFF;
}
td {
    padding: 10px;
    border: 1px solid #333333;
    background-color: #90CDF4; /* Blue-300 */
    color: #000000;
}
/* Additional CSS for background color */
body {
    background-color: #4a5568;
}
/* Additional css to replace empty elements with "|------|" for "ALL" option */
body [data-option="ALL"] table td div:empty::before {
    content: "|------|";
}
</style>
</head>
<body data-option="' . $option . '">
<div class="result-container">
<h1>Data from UDP \'' . htmlspecialchars($option) . '\':</h1>
<table>
<tr>
<th>Data</th>
</tr>';
                    foreach ($lines as $line) {
                        echo '<tr>
<td><div>' . htmlspecialchars($line) . '</div></td>
</tr>';
                    }
                    echo '</table>
</div>
</body>
</html>';
                }
            }
        } elseif ($protocol == 'arp') {
            $filename = '';
            // Handle ARP protocol options similarly as UDP
            if ($option == 'Timestamp') {
                $filename = 'packets/arptimestamp';
            } elseif ($option === 'ALL') {
                $filename = 'packets/arpall';
            } elseif ($option === 'Source MAC Address') {
                $filename = 'packets/arpsourcemac';
            } elseif ($option === 'Destination MAC Address') {
                $filename = 'packets/arpdestinationmac';
            } elseif ($option === 'ARP Operation') {
                $filename = 'packets/arparpoperation';
            } elseif ($option === 'ARP Payload Length') {
                $filename = 'packets/arparppayloadlength';
            }

            if (!empty($filename)) {
                $data = file_get_contents($filename);
                if ($data !== false) {
                    $lines = explode("\n", $data);
                    echo '<!DOCTYPE html>
<html>
<head>
<title>Form Submission Result</title>
<style>
/* Your existing CSS styles here */
body {
    background-color: #4a5568;
}
.result-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}
table {
    border-collapse: collapse;
    margin-top: 10px;
    width: 90vw; /* Set the table width to 90% of the viewport width */
}
th {
    padding: 10px;
    border: 1px solid #333333;
    background-color: #0D9488; /* Teal-700 */
    color: #FFFFFF;
}
td {
    padding: 10px;
    border: 1px solid #333333;
    background-color: #90CDF4; /* Blue-300 */
    color: #000000;
}
/* Additional CSS for background color */
body {
    background-color: #4a5568;
}
/* Additional css to replace empty elements with "|------|" for "ALL" option */
body [data-option="ALL"] table td div:empty::before {
    content: "|------|";
}
</style>
</head>
<body data-option="' . $option . '">
<div class="result-container">
<h1>Data from ARP \'' . htmlspecialchars($option) . '\':</h1>
<table>
<tr>
<th>Data</th>
</tr>';
                    foreach ($lines as $line) {
                        echo '<tr>
<td><div>' . htmlspecialchars($line) . '</div></td>
</tr>';
                    }
                    echo '</table>
</div>
</body>
</html>';
                }
            }
        }
    }
}
?>
