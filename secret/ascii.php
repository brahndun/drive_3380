<?php
$title = "Star Wars ASCII";
include "../login/misc/pagehead.php";
?>
<style>
    #footer {
        bottom: 0;
        right: 0;
        left: 0;
        position: absolute;
        width: 100%;
        text-align: center;
        font-size: 11px;
    }

    #screen {
        text-align: left;
        font-size: 15px;
        font-family: Courier New, Fixed;
        line-height: 16px;
        color: white;
        width: inherit;
        height: inherit;
        display: block;
        white-space: pre;
	    background-color: black;
    }

    #container {
        background-color: black;
        width: 45em;
        height: 250px;
	    margin: auto;
    }

    #buttonContainer{
        text-align:center;
    }

    #buttons a:link {
        color: black
    }

    #buttons a:visited {
        color: black
    }

    #buttons a:hover {
        color: #E2B448
    }

    #buttons a:active {
        color: #E2B448
    }

    #buttons a {
        text-decoration: none
    }
</style>
<?php require "../login/misc/pullnav.php"; ?>
</head>
<script>

    var LINES_PER_FRAME = 14;

    var g_currentFrame = 0;
    var g_updateDelay = 67;
    var g_frameStep = 1; //advance one frame per tick
    var g_timerHandle = null;

    if (film) {
        window.onload = function() {
            Play();
        };
    } else {
        film = new Array(); //empty film to prevent js errors
	location.reload();
    }

    function validateFrame(frameNumber) {
        return (frameNumber > 0 && frameNumber < Math.floor(film.length / LINES_PER_FRAME))
    }

    function displayFrame(frameNumber) {
        if (validateFrame(frameNumber) != true)
            return;

        var screen = document.getElementById('screen');

        while (screen.firstChild)
            screen.removeChild(screen.firstChild);

        //var buffer = document.createElement('span');
        for (var line = 1; line < 14; line++) {
            var lineText = film[(g_currentFrame * LINES_PER_FRAME) + line];
            if (!lineText || lineText.length < 1)
                lineText = ' ';

            var div = document.createElement('div');
            div.style.whiteSpace = 'pre';
            div.appendChild(document.createTextNode(lineText));

            screen.appendChild(div);
        }
    }

    function updateDisplay() {
        if (g_timerHandle)
            clearTimeout(g_timerHandle);

        displayFrame(g_currentFrame);

        if (g_frameStep != 0) {
            //read the first line of the current frame as it is a number containing how many times this frame should be displayed
            var nextFrameDelay = film[g_currentFrame * LINES_PER_FRAME] * g_updateDelay;

            var nextFrame = g_currentFrame + g_frameStep;

            if (validateFrame(nextFrame) == true)
                g_currentFrame = nextFrame;

            g_timerHandle = setTimeout(updateDisplay, nextFrameDelay);
        }
    }

    function Start() {
        g_currentFrame = 0;
        Play();
    }

    function FrameBack() {
        g_frameStep = 0;

        var nextFrame = g_currentFrame - 1;
        if (validateFrame(nextFrame) == true)
            g_currentFrame = nextFrame;

        updateDisplay();
    }

    function Stop() {
        g_frameStep = 0;
        updateDisplay();
    }

    function FrameAdvance() {
        g_frameStep = 0;

        var nextFrame = g_currentFrame + 1;
        if (validateFrame(nextFrame) == true)
            g_currentFrame = nextFrame;

        updateDisplay();
    }

    function Play() {
        g_frameStep = 1;
        g_updateDelay = 67;
        updateDisplay();
    }


    function End() {
        g_frameStep = 0;
        g_currentFrame = Math.floor(film.length / LINES_PER_FRAME) - 1;
        updateDisplay();
	location.reload();
    }
</script>

<body>
    <div id="container">
        <pre id="screen">

            Asciimation may take some time to load...

	    </pre>
    </div>
    <div id="buttonContainer">
        <div id="buttons">
            <font face="Arial" size="3">
                <a href="#" onclick="Start()" title="Start"> |&lt;</a>&nbsp;&nbsp;
                <a href="#" onclick="FrameBack()" title="Back one frame"> 1&lt;</a>&nbsp;&nbsp;
                <a href="#" onclick="Stop()" title="Stop"> #</a>&nbsp;&nbsp;
                <a href="#" onclick="Play()" title="Play"> &gt;</a>&nbsp;&nbsp;
                <a href="#" onclick="FrameAdvance()" title="Advance one frame"> &gt;1</a>&nbsp;&nbsp;
                <a href="#" onclick="End()" title="End"> &gt;|</a>&nbsp;&nbsp;&nbsp;
            </font>
        </div>
    </div>
    <div id="footer">
        <header style="color:#b3b3b3">Copyright &#169 2019 Drive</header>
    </div>
</body>
</html> 