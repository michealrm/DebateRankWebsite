<html>

  <head>
    <title>Debate Rank - FAQ</title>
    <?php include 'templates/headers.html'; ?>
  </head>

  <body>

    <?php include 'templates/nav.html'; ?>

    <section class="bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </section>

    <br />

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <h4>Why is my name/team being returned twice?</h4>
        <p>Since all the data behind Debate Rank is compiled using a program, we have to use some indexing methods to translate plain text into debaters that we can recognize. When there are disparities in the entry or school names that we haven’t accounted for, we assume it’s a new debater. If your name is returned twice, please take a moment to e-mail our support team at <a href="mailto:help@debaterank.com">help@debaterank.com</a> so we’re able to investigate and fix the issue.</p>
        
        <br>

        <h4>How do the ratings work?</h4>
        <p>We use the Glicko-2 rating system by Mark Glickman to assign debaters ratings. Here’s a friendly explanation by /u/example:</p>
        <p>[quoted box]</p>
        <p>For the more interested users, here are our population parameters: μ=1500, RD=175 σ=.06, τ=.75. There are [number of tournament weekends] rating period updates, one each tournament weekend. We only count wins and losses. Byes/drops/forfeits have no influence on a debaters rating.</p>
        
        <br>

    	<h4>Can I remove my name from Debate Scout without the addon?</h4>
    	<p>In general cases - no. First, to ensure the integrity of this service, we have to construct some kind of a deterrent to removing your name from the listings. If we didn't, no one would be listed here. Second, with a site full of debaters around the country, privacy and strategy are indistinguishable. Third, we compile this information from a multitude of sites, all of which are public. That means that even if you remove your listing from Debate Rank because of privacy reasons, your information will still be available on other sites.</p>
    	<p>In the case of privacy, we'd suggest contacting the websites that we compile information from. Once you remove your information from those websites, contact us and we'll make sure it's removed from our website.</p>

        <br>

        <h4>Who was Debate Scout made by?</h4>
	<p>My name is Micheal Myers (yes, I’ve gotten the Halloween thing a lot!) and I’m a Junior from Tom C. Clark High School in San Antonio, Texas.</p>

        <br>

	</div>
	<div class="col-sm-1"></div>

    <?php include 'templates/scripts.html'; ?>
  </body>

</html>