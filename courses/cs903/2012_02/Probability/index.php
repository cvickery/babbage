<?php
  header("Vary: Accept");
  if (  array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") ||
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator")
      )
  {
    header("Content-type: application/xhtml+xml");
    header("Last-Modified: "
                    .gmdate('r',filemtime($_SERVER['SCRIPT_FILENAME'])));
    print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>

    <title>Probability Theory</title>
    <link rel="shortcut icon" href="../../cs903/favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../../css/assignments-print.css"
    />
    <style type="text/css">
      ul li {padding:0.2em;}
      canvas {
        border: 1px solid green;
        display:block;
        width:300px;
        height:150px;
        margin: auto;
      }
    </style>
    <script type='text/javascript' src='js/jquery-1.7.2.min.js'></script>
    <script type='text/javascript' src='js/pt.js'></script>
  </head>
  <body>
    <h1>Probability Theory in One Page</h1>
    <h2>Basic Concepts</h2>
    <div>
      <p>
        This is a summary of some principles of probability theory. The context is the types of
        reasoning that artificial (and human) agents perform. It’s not a mathematical treatise,
        and it’s not deep.
      </p>
      <p>
        Probability is intrinsically related to <em>randomness</em>, which in turn is easier to
        understand intuitively than it is to pin down precisely. In fact, if you do some research,
        you won’t have to go further than Wikipedia to find that there are alternative models of
        randomness. For our purposes, it refers to anything that can’t be known with certainty. If
        information theory is what lets us measure information accurately, probability theory is
        what lets us deal with information that can’t be measured accurately.
      </p>
      <p>
        You can think of probability theory as a way of dividing a bit of information into smaller
        units. If a bit’s value of “1” means “yes” and the value “0” means “no,” then “maybe” could
        be thought of as a probability with a numerical value somewhere between 0 and 1.
      </p>
      <p>
        If you flip a normal coin (called a “fair” coin in probability parlance), you normally have
        no way to predict whether it will come up heads or tails. Both outcomes are equally likely.
        There is one bit of uncertainty; the probability of a head, written <em>p(h)</em>, is 0.5
        and the probability of a tail (<em>p(t)</em>) is 0.5. The sum of the probabilities of all
        the possible outcomes adds up to 1.0, the number of bits of uncertainty we had about the
        outcome before the flip.
      </p>
      <p>
        But what if we build a coin that’s weighted so it comes up heads 3/4 of the time? That is,
        instead of <em>p(h)</em> = 0.5 = <em>p(t)</em>, we have <em>p(h)</em> = 0.75 and
        <em>p(t)</em> = 0.25.  There is still one bit of information in the coin flip (we don’t know
        in advance which of the two outcomes will occur), but the unequal probabilities allow us
        to adjust our behavior (by placing bets, for example) more intelligently than if the coin
        was fair.
      </p>
      <h3>Multiple Events</h3>
      <div style="border:none;margin:0.5em 1em;">
        <p>
          What happens if you flip a coin more than once? If it is fair and you flip it two times,
          there are four equally-likely possible outcomes: <em>tt</em> (tails on the first flip
          followed by tails on the second flip), <em>th</em> (tails followed by heads),
          <em>ht</em>, and <em>hh</em>. This pattern should look familiar: if you substitute “0” for
          “t” and “1” for “h” you get the four binary combinations of two bits, in numerical order:
          00, 01, 10, and 11.)
        </p>
        <p>
          Since exactly one of the four outcomes has to happen, the sum of the probabilities for the
          four possibilities has to be 1.0. To relate this to information theory, this is like
          saying there is one bit of uncertainty about which of the four outcomes will happen before
          each pair of coin flips. And since each combination is equally likely, the probability of
          each outcome is 1/4 = 0.25.
        </p>
        <p>
          This is a case of an “AND” relationship: the probability of heads on the first flip AND
          tails on the second flip (<em>ht</em>) is 0.25.  When there is an AND relationship, you
          <em>multiply</em> the component probabilities to get the probability of the sequence:
          multiply p(<em>h</em>), which is 0.5 by p(<em>t</em>), which is also 0.5, to get the
          resultant probability of heads on the first flip AND tails on the second flip, 0.25.
        </p>
        <ul>
          <li>
            What is p(<em>ht</em>) for a weighted coin where p(<em>h</em>) is 0.75 instead of 0.5?
            <br/><em title='0.75 × 0.25 = 0.1875'>Hover for answer</em>.
          </li>
          <li>
            What are the probabilities of the other three possible sequences (<em>tt</em>,
            <em>th</em>, and <em>hh</em>, and what is the sum of all four?
            <br/><em title='0.0625, 0.1875, and 0.5625; the sum of all four is 1.0'>Hover for
            answer</em>.
          </li>
        </ul>
        <p>
          If you ask an “OR” question, you <em>add</em> probabilities instead of multiplying, but
          you have to be careful not to add the same value multiple times. If the question is,
          “with a fair coin, what
          is the probability of getting heads on the first flip OR the second flip, you add the
          the probabilities for all the combinations that start with <em>h</em> (<em>ht</em> and
          <em>hh</em>; 0.25 + 0.25 = 0.5) and all the combinations that end with <em>h</em>
          (<em>th</em> and <em>hh</em>; 0.25 + 0.25 = 0.5), but that counted the <em>hh</em>
          combination twice, so you have to subtract one of them out of the answer (0.25 + 0.25) +
          (0.25 + 0.25) - 0.25 = 0.75. It’s usually easier to convert OR questions to the negation
          of an AND question, and to subtract the result from 1.0. The probability of getting a head
          on either the first <strong>or</strong> the second flip is 1.0 minus the probability of
          not getting heads on the first flip <em>and</em> not getting heads on the second flip.
          1.0 - (0.5 × 0.5) = 1.0 - 0.25 = 0.75.
        </p>
        <p>
          Sometimes you have to play with the words to turn probability questions into AND or OR
          questions. For example, “what is the probability of two heads in a row,” has to be turned
          into, “what is the probability of heads on the first flip <strong>and</strong> heads on
          the second flip. But once you do that, you don’t need any more rules than the above.
        </p>
        <p>
          To keep the link to information theory intact when talking about multiple events,
          remember that it’s the
          whole sequence of events that is being reduced to a single bit. That is, the information
          theory version of the “probability of at least one head” question has to be turned into a
          single question that is answered “yes” or “no:” “Is the outcome <em>th</em>, <em>ht</em>,
          <strong>or</strong> <em>hh</em>?”
        </p>
      </div>
    </div>
    <h2>Conditional Probability</h2>
    <div>
      <p>
        <em>Conditional probability</em> refers to the situation when multiple events occur in
        sequence and the events are linked in some way such that knowledge of prior events can
        change probabilities of subsequent events. This is distinguished from the coin flip case,
        where the first flip tells you nothing about what will happen on the second flip. If you
        know that it’s always cold when it snows, then observing that it is snowing lets you say
        with certainty that it is cold because the <em>probability of cold given snow</em> is 1.0.
        Note that this can work both ways, but (usually) not symmetrically: the propbability of it
        being cold when it is snowing is different from the probability that it is snowing when it
        is cold.
      </p>
      <p>
        As an aside, let’s quickly point out that conditional probability is related to
        <em>correlation</em>, but not necessarily to <em>causation</em>. If you go for a walk and
        see that a lot of tall people are wearing yellow socks, it doesn’t say that yellow socks
        cause tallness, nor that tallness causes yellow socks. But they are correlated (at least
        during that walk), and the
        conditional probability of seeing yellow socks is higher given that someone is tall is
        higher than if the person is not tall, and <em>vice-versa</em>.
      </p>
      <p>
        The notation for conditional probability uses the ‘|’ symbol: p(<em>a</em> | <em>b</em>) is
        “the probability of <em>a</em> given <em>b</em>. In the coin-flipping case,
        p(<em>h</em> | <em>t</em>) is the probability that the second flip is heads given that the
        first flip came up tails. For a fair coin, the value would be 0.5. For the weighted coin,
        the value would be 0.75.  That is, in both cases, the outcome of one flip doesn’t
        affect the probability of the next outcome, and conditional probabilities dont’t tell you
        anything that regular probabilities. But p(<em>snow</em> | <em>cold</em>) gives you more
        information than p(<em>snow</em>) alone.
      </p>
      <p>
        With conditional probabilities, you can start to answer other kinds of questions than you
        could with regular probabilities. For
        example, if you flip a coin 100 times and it comes up heads 100 times, you are pretty
        certain it’s not a fair coin. The probability it is a fair coin is not zero, it’s 0.5<span
        class='superscript'>100</span> (0.000000000000000000000000000000078886090522). But if you
        had to bet on the outcome of the next flip, you’d be stupid not to pick heads.
      </p>
    </div>
    <h2>Bayes’ Theorem</h2>
    <div>
      <p>
        Conditional probabilities play an important role in how we (or artificial intelligence
        agents) make decisions based on observations of the real world. A small bit of
        algebra leads to a key equation called <em>Bayes’ Theorem</em>. First, a basic principle:
        p(<em>a</em> · <em>b</em>) = p(<em>a</em> | <em>b</em>) · p(<em>b</em>). The probability of
        both <em>a</em> and <em>b</em> happening
        is equal to the probability of <em>a</em> given <em>b</em> times the probability of
        <em>b</em>. A way to see this is with a <em>Venn Diagram</em>:
      </p>
      <canvas></canvas>
      <p>
        Here, the rectangle represents the universe of all possible outcomes: its area represents
        the total probability that some event occurs, which is 1.0 by definition. The area of the
        red circle, which we’ll call <em>a</em>, represents the probability that event <em>a</em>
        happens by chance; the area of the green circle, which we’ll call <em>b</em>, represents the
        probability that event <em>b</em> happens by chance; the area of the overlapping region
        shows the <em>joint probability</em>, the chance that a random event will be both <em>a</em>
        <strong>and</strong> <em>b</em>.  Depending on the particular universe of events being
        depicted, the areas of the <em>a</em>, <em>b</em>, and their overlapping region could
        each be anything from 0 to 1.0.
      </p>
      <p>
        The rectangle is 300 pixels wide and 150 pixels tall. The red and green circles both
        have radii (<em>r</em> of 60 pixels. The area of a circle is π × <em>r</em>².
      </p>
      <ul>
        <li>
          What is the area of the rectangle?
          <br/><em title='300 × 150 = 45,000 px²'>Hover for answer.</em>
        </li>
        <li>
          What is the area of the red circle?
          <br/><em title='3.14 × 60² = 11,310 px²'>Hover for answer.</em>
        </li>
        <li>
          What is the area of the green circle?
          <br/><em title='Same as the red one.'>Hover for answer.</em>
        </li>
        <li>
          I have a magical dart throwing device, which throws darts that always land inside
          the gray rectangle, but exactly where is totally randon. What is the probability that a 
          dart will land inside the green circle? (Calculate what portion of the gray rectangle
          is covered by the green circle.)
          <br/><em title='11,310 ÷ 45,000 = 0.25'>Hover for answer.</em>
        </li>
        <li>
          Assume the dark blue region has an area of 900 px² (It does, actually.) What is the
          probability that a dart will land inside the blue region?
          <br /><em title='900 ÷ 45,000 = 0.02'>Hover for answer.</em>
          <div>This is p(<em>a · b</em>).</div>
        </li>
        <li>
          A dart is known to have landed inside the green circle. What is the probability that it
          landed inside the blue region? 
          <br /><em title='900 ÷ 11,310 = 0.08'>Hover for answer.</em>
          <div>This is p(<em>a</em> | <em>b</em>). That is, knowing that the dart landed inside
          the green circle is a given condition, and it affects our uncertainty about the outcome.
          In this case, it quadrupled the probability of <em>a</em> compared to simply knowing
          that the dart landed somewhere inside the gray rectangle (0.02 => 0.08).</div>
        </li>
        <li>
          What is p(<em>a</em> | <em>b</em>) · p(<em>b</em>)?
          <br /><em title='0.08 × 0.25 = 0.02'>Hover for answer.</em>
          <div>
            That is, the same as p(<em>a</em> · <em>b</em>).
          </div>
        </li>
      </ul>
      <p>
        The same reasoning applies to multiple events that are somehow dependent on one another.
        It’s a bit contrived, but to keep the magic dart throwing device example going: pretend that
        when a dart lands inside the green circle, everything else disappears so that the green
        circle becomes the “universe” for a second dart throw. The probability that the second
        dart will land in the blue region is p(<em>a</em> | <em>b</em>), so the overall probability
        that the second dart lands in the blue region, p(<em>a</em> · <em>b</em>), is the
        probability of landing in the blue region given that the universe has been reduced to the
        green region, p(<em>a</em> | <em>b</em>) · p(<em>b</em>).
      </p>
      <p>
        The “small bit of algebra” mentioned above is this: p(<em>a · b</em>) is the same whether
        you think of it as a portion of <em>a</em> or as a portion of <em>b</em>:
      </p>
      <div style='margin-left:1em;'>
        <p>
          <div>
            p(<em>a · b</em>) = p(<em>b</em> | <em>a</em>) · p(<em>a</em>)
          </div>
          and
          <div>
            p(<em>a · b</em>) = p(<em>a</em> | <em>b</em>) · p(<em>b</em>)
          </div>
          That is,
          <div>
            p(<em>b</em> | <em>a</em>) · p(<em>a</em>) =
            p(<em>a</em> | <em>b</em>) · p(<em>b</em>)
          </div>
        </p>
      </div>
      <p>
        You do the algebra: what are the equations for these?
        <ul>
          <li>
            p(<em>a</em> | <em>b</em>)
            <br /><em title='p(a | b) = (p(b | a) · p(a)) ÷ p(b)'>Hover for answer.</em>
          </li>
          <li>
            p(<em>b</em> | <em>a</em>)
            <br /><em title='p(b | a) = (p(a | b) · p(b)) ÷ p(a)'>Hover for answer.</em>
          </li>
        </ul>
      </p>
    </div>
    <h2>Causal and Diagnostic Reasoning</h2>
    <div>
      <p>
        We mentioned that correlation is not the same as causality above. But what if two events
        <em>are</em> causally related? What if <em>a</em> has some probability of causing
        <em>b</em>?  Bayes’ Theorem says we can reason either causally: (given the cause,
        <em>a</em>, what is the probability that the effect, <em>b</em>, will occur? And we can
        reason <em>diagnostically</em>: if we observe a known effect, <em>b</em>, what is the
        probability that it was caused by <em>a</em>? The term “diagnostic” is used because of
        the analogy with how doctors diagnose a patient’s disease state (the cause) based on the
        symptoms presented, the results of lab tests, etc. 
      </p>
      <p>
        Unfortunately, we’re at the bottom of this web page and don’t have room to see how
        Bayes’ Theorem can actually be used by intelligent agents to make decisions …
      </p>
    </div>
    <div id="footer">
      <a href="http://validator.w3.org/check?uri=referer">XHTML</a>&mdash;<a
         href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS</a>
    </div>
  </body>
</html>
