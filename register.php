<html>
<head>
    <link rel="stylesheet" href="./pure-min.css">   
    <link rel="stylesheet" href="./1.7.7.css">
    <script async="" src="./Pure_files/analytics.js"></script><script src="./Pure_files/gis6vng.js"></script><style type="text/css"></style>    
    <script src="http://use.typekit.net/gis6vng.js"></script>
    <script>
    try { Typekit.load(); } catch (e) {}
    </script>
        <style type="text/css">.header h1,.hero h1,.hero h2,.tk-omnes-pro{font-family:"omnes-pro",sans-serif;}</style>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-41480445-1', 'purecss.io');
    ga('send', 'pageview');
    </script>
    <style>
    .myclass{
        margin-left: -100px;
    }
    </style>
</head>
<body>
    <div class="pure-u-1" id="main" style="position:absolute;width:100%;left:0%;top:0%">
        <div class="hero" id="default">
            <div class="hero-titles">
                <h2>Online Movie Recommendation Engine</h2>
            </div>
            <div class="hero-titles">
                <h1>Register</h1>
            </div>
            <form class="pure-form pure-form-aligned myclass" method="POST" action='adduser.php'>
                <fieldset>

                    <div class="pure-control-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" placeholder="Username">
                    </div>

                    <div class="pure-control-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" placeholder="Password">
                    </div>

                    <div class="pure-control-group">
                        <label for="email">Email Address</label>
                        <input name="email" type="email" placeholder="Email Address">
                    </div>

                    <div class="pure-control-group">
                        <label for="age">Age</label>
                        <input name="age" type="text" placeholder="Age">
                    </div>

                    <div class="pure-control-group">
                        <label for="name">Profession</label>
                        <select name="profession">
                            <option value='administrator'>administrator</option>
                            <option value='artist'>artist</option>
                            <option value='doctor'>doctor</option>
                            <option value='educator'>educator</option>
                            <option value='engineer'>engineer</option>
                            <option value='entertainment'>entertainment</option>
                            <option value='executive'>executive</option>
                            <option value='healthcare'>healthcare</option>
                            <option value='homemaker'>homemaker</option>
                            <option value='lawyer'>lawyer</option>
                            <option value='librarian'>librarian</option>
                            <option value='marketing'>marketing</option>
                            <option value='other'>other</option>
                            <option value='programmer'>programmer</option>
                            <option value='retired'>retired</option>
                            <option value='salesman'>salesman</option>
                            <option value='scientist'>scientist</option>
                            <option value='student'>student</option>
                            <option value='technician'>technician</option>
                            <option value='writer'>writer</option>
                        </select>
                    </div>

                    <div class="pure-control-group">
                        <label for="gender">Gender</label>
                        <select name="rating" >
                            <option value='M'>M</option>
                            <option value='F'>F</option>
                        </select>
                    </div>

                    <div class="pure-controls">
                        <button type="submit" class="pure-button pure-button-primary">Submit</button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>