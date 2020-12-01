<?php
  $mime_type = "text/html";
  $html_attributes="lang=\"en\"";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    $html_attributes = "xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\"";
    header("Content-type: $mime_type");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>
    <title>CSCI 100 Assignment 5</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/assignments-print.css"
    />
  </head>
  <body>
    <h1>CSCI 100 Assignment 5</h1>
    <h2>Starting Artificial Intelligence: Searching for Solutions</h2>
    <div>
      <p>
        Tuesday, April 1, we will go to the lab to work on the binary counter project some more. If you don’t finish
        the assignment then, you will still be able to use the lab any time the Computer Science Department office is
        open: any one of the three people behind the counter there will open the lab for you, and they will keep your
        project box there for you if you don't want to carry it around. The lab will continue to be available to you
        this way for the rest of the semester for those of you who decide to do an advanced Arduino project instead
        of a term paper.
      </p>
      <p>
        Starting this Thursday, April 3, we will to start covering Artificial Intelligence topics in the course, and
        your next assignments
        will introduce you to some basic ideas about how "intelligent agents" operate. Intelligent agents could be
        people, or they could be computers. In either case, their task is to solve problems that require
        <em>searching</em> for their solutions, as opposed to simply calculating them.
      </p>
      <p>
        This web page reviews some basic arithmetic terminology that you need to be comfortable with. You may have
        forgotten some of this material, but there is nothing new here that you didn’t master before you got to
        college.
      </p>
      <p>
        Some problems require searching for their solutions because the solutions are too complicated to calculate
        in a reasonable amount of time. For example, it would be possible in principle to calculate the perfect
        move to make for any possible chess board position. In fact, for an “end game,” where only a few pieces
        are left on the board, this can actually be done. But early in the game there are so many possible moves and
        counter-moves that even the most powerful computers cannot calculate them all and come up with the best
        move in a meaningful amount of time. (Look up “Shannon number” for more information on this example.)
      </p>
      <p>
        <em>Shannon? Isn’t he the guy who invented information theory? What’s he doing in a discussion of
          artificial intelligence?</em>
      </p>
      <p>
        Other problems require searching for their solutions because we don’t have all the information we
        need to calculate the answer. Often, for this kind of problem, we have <em>partial information</em>. For
        example, if the problem is to buy a reliable car, there might be frequency of repair data for the
        different cars being considered. Getting the model with the best repair record doesn’t guarantee that the
        particular car you buy will be free of problems, but the chances of it being good are better than if
        you picked one with a poor repair record.
      </p>

      <p>
        Which brings us to the topics of “Chance, Luck, and Statistics.” (That’s actually the title of a book
        published in 1939 that is still in print, which gives an idea of how important the topic is!)
      </p>
      <p>
        Your assignment for April 8 (see below) will take you quite far into one of the main types of
        calculation that intelligent agents need to make when faced with incomplete or imperfect information
        about a problem. But before delving into the arithmetic involved, be sure you understand the following
        terms. They are all different ways of talking about ratios, which are what you get when you do division.
        Remember that the word “per” is another way of talking about ratios: Miles <span>per</span> hour;
        revolutions <span>per</span> minute; cycles <span>per</span> second are all ratios that involve dividing
        by time units, for example. But for the ratios we will deal with here, we will most often be dividing by
        a number of events or objects rather than by time.
      </p>
      <p>
        Despite the order of the terms in the following list, the one term that is most important is
        <em>probability</em>. That’s the type of number that artificially intelligent agents use when
        searching for solutions, but humans also talk about those same numbers using the other terms listed.
        That is, intelligent agents try to determine what choice has the greatest probability
        of leading to the correct solution to a problem (or the best solution, or even just a satisfactory one).
        People just talk about it less formally. In fact, people sometimes make mistakes because they they aren’t
        as careful about the numbers they work with as artificially intelligent agents are.
      </p>
      <h3>Definitions</h3>
      <dl>
        <dt>Percentage</dt>
        <dd>
          A number ranging from 0 (“none”) to 100 (“all”), with numbers above 100 meaning “more than all.”
          Tuesdays occur once in every seven days, so the percentage of days that are Tuesdays is 1/7 times 100,
          or 14.29%. That is, a percentage is a ratio multiplied by 100. Percentages can be bigger than 100%. For
          example, if one thing is twice as big as something else, you might say it is 200% as big.
        </dd>
        <dt>Proportion</dt>
        <dd>
          A number ranging from 0 (“none”) to 1.0 (“all”). Just like percentage, but without multiplying by
          100. Proportions can’t be greater than 1.0 because of the way the world works.
          For example, it might make sense to say "Three of those four books are blue," giving a proportion of
          3÷4 = 0.75. But it wouldnt make any real-world sense to say "Five of those four books are blue," and
          that would give a proportion greater than 1.0 (5÷4 = 1.25).
        </dd>
        <dt>Probability</dt>
        <dd>
          Probabilities are just like proportions: numbers ranging from 0 (“never”) to 1.0 (“always”), with
          no logical way for the number to be greater than 1.0. Probabilities are used when there is no way
          to know exactly whether an event will actually happen or not. That is, probabilities are used to
          predict future events, and the prediction is made in either of two ways:
          <ol>
            <li>
              By the physical or logical properties of the situation. For example, if a triangular pyramid
              has four identical triangular surfaces and I throw it in the air, the probability that any
              particular one of its four faces will land on the bottom is 1÷4 = 0.25.
            </li>
            <li>
              By using historical data to predict the future. For example, if Dr. Vickery gave A’s to 19
              out of 20 students last semester, to predict that the probability of getting an A in his course
              this semester is 19/20 = 0.95. (<em>Note: Dr. Vickery didn’t actually teach any courses
              last semester, so don’t get any ideas from this example!</em>)
            </li>
          </ol>
          An important feature of probabilities is that if you know all the possible outcomes, the sum of
          their individual properties has to be 1.0. For the pyramid example, there are four possible
          outcomes, each with a probability of 0.25, for a total of 1.0. If the probability of rain tomorrow
          is 0.9, then the probability of no rain is 0.1.
        </dd>
        <dt>Chance</dt>
        <dd>
          Another word for probability, but typically expressed as a percentage by multiplying the
          probability by 100. So if the probability of rain tomorrow is 0.9, we say “a 90% chance of
          rain.” The chance the sun will come up tomorrow is 100% is the same as saying the probability
          is 1.0.
        </dd>
        <dt>Odds</dt>
        <dd>
          The same as chance or probability, but expressed as a ratio of positive outcomes to negative
          outcomes instead of positive outcomes to total outcomes. If the chance of rain is 90% the
          odds are 90 to 10, often written as 90:10. The numbers are often divided down to make them
          simpler, but not always. The odds of rain are 9:1. But if they are 1:1 (probability of 0.5),
          people will normally say “50-50 chance of rain,” or the odds are ”even.”
          <p>
            I’m not sure why there are so many ways of using odds to talk about probabilities, but it somehow
            seems more intuitive to most people. I just find it confusing and tend to avoid talking that way!
          </p>
        </dd>
      </dl>
      <h3 id='april-3'>Assignment for April 3</h3>
      <div>
        <p>
          For April 3, your brief quiz will test how well you understand these definitions. Here are some
          sample questions you can use for practice. Do not hand in your answers, just be sure you can
          get them right:
        </p>
        <ul>
          <li>What is an "intelligent agent"?</li>
          <li>Why do intelligent agents search for solutions rather than calculate solutions to problems?</li>
          <li>How do intelligent agents search for solutions?</li>
          <li>What does “20% of” something mean? For example, what is 20% of 500 pounds of sugar?</li>
          <li>If a weather forecaster says rain tomorrow is 70:10, he's talk about…</li>
          <li>If a weather forecaster says rain tomorrow is 70%, he's talking about…</li>
          <li>If a weather forecaster says rain tomorrow is at 0.7,  he's talking about…</li>
          <li>If your professor tells you 5 of 20 students failed an exam, she's talking about…</li>
          <li>If your sister tells you she received 90% on an exam, she's talking about…</li>
          <li>
            What does “20% off” something mean? For example, if a soldering iron normally costs $20 and
            it’s on sale for 20% off, how much does it cost now?
          </li>
          <li>
            What does “20% faster” than something mean? For example if I can swim a mile in an hour,
            how long will it take me if I swim 20% faster? If computer A takes 10 minutes to solve a
            problem, and computer B takes 12 minutes to solve the same problem, how much faster is
            computer A than computer B?
          </li>
          <li>
            If I buy a dozen (12) eggs, and 3 of them are brown, what is the proportion of brown eggs?
          </li>
          <li>
            If I flip a fair coin, what is the probability it will come up heads? What is the probability
            it will come up tails? What is the sum of these two probabilities?
          </li>
          <li>
            If I roll a pair of dice, what is the probability it will come up “snake eyes” (both die show
            the number one)? Hint: this is one of the 36 possible combinations of the six faces on each
            die.
          </li>
          <li>
            Albequerque has an average of 280 sunny days per year. What is the probability it will be
            sunny in Albequerque tomorrow?
          </li>
          <li>
            What are the odds a fair coin will come up heads?
          </li>
          <li>
            <strong>Bonus: </strong>A bookmaker gives odds of 2:1 against a horse named Boilerplate winning
            a race. That means that if I bet $1 and Boilerplate wins, the bookmaker will give me $3.
            If Boilerplate loses, the bookmaker gives me back one dollar.
            What probability of Boilerplate winning would make this a fair bet?
          </li>
        </ul>
        <p>
          View <a href='http://www.youtube.com/watch?v=eBSS61XaAIc#t=204'>this video on AI</a> before class.
        </p>
      </div>
      <h3 id='april-8'>Assigment for April 8</h3>
      <div>
        <p>
          For Thursday, April 8, your assignment is to view another TED-ed lesson that Lizandra Friedland prepared:
          <a href='http://ed.ted.com/on/aeYkCjJ4'>How to Predict the Odds of Anything</a>. Be sure to log in to the
          site so your answers will be recorded.
          Answer all the short answer questions and the two longer questions before class.
        </p>
        <p>
          This is a hard lesson: the guy talks too fast to get it all. Be prepared to go through the video a few
          times to catch all the numbers.
        </p>
      </div>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>
