#! /usr/local/bin/bash
echo "Content-type: text/html"
echo ""
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\""
echo "  \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">"
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">"

echo "<head><title>Form Processing Script: Bash Version</title>";
echo "<link rel=\"shortcut icon\" href=\"/favicon.ico\" />"
echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\""
echo "  href=\"/courses/css/style-all.css\" />"
echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\""
echo "  href=\"/courses/css/style-screen.css\" />"
echo "<style type=\"text/css\">"
echo "caption { font-weight:bold;font-size:1.3em;padding:1em;caption-side:top}"
echo "</style>"

echo "</head><body><div id=\"header\">"
echo "<h1>Form Processing Script: Bash Version</h1>"
echo "</div><div id=\"content\">"

if [[ $REQUEST_METHOD != "" ]]
then echo "<h2>The Request Method was $REQUEST_METHOD</h2>"
else echo "<h2>There was no Request Method specified</h2>"
fi

if (( ${#QUERY_STRING} > 0 ))
then
  echo "<h3>QUERY_STRING</h3>"
else
  echo "<h2>Standard Input Stream (<em>stdin</em>)</h2>"
  read QUERY_STRING
fi

qs=$QUERY_STRING
let len=${#qs}

if (( $len > 100 ))
then
  echo "<p><em>Long lines forced to wrap every 100 characters.</em></p>"
fi
echo "<div class='whitebox'><pre>"
while (( len > 0 ))
do
  localqs=${qs:0:100}
  localqs=${localqs//&/&amp;}
  localqs=${localqs//</&lt;}
  echo "${localqs}"
  let len=len-100
  qs=${qs:100}
done

echo "</pre></div>"
QUERY_STRING=$(echo "$QUERY_STRING" | tr "+" " ")
QUERY_STRING=$(echo "$QUERY_STRING" | ./unescape)
#echo "<fieldset><legend>Debugging</legend>"
#echo "<div class='whitebox'><pre>$QUERY_STRING</pre></div>"
#echo "</fieldset>"
IFS="&"
set -- $QUERY_STRING
echo "<h3>There were $# parameters</h3>"
if [[ $# > 0 ]]
then
  echo "<table summary=\"Parameter Names and Their Values\">"
  echo "<caption>Parameter Names and Their Values</caption>"
  echo "<tr><th>Name</th><th>Value</th></tr>"
  for param in $@
  do
    # Separate name=value into lhs and rhs; block tags, fix
    # ampersands left behind by ./unescape, and restore <br />,
    # assuming they were inserted by ./unescape.
    lhs=${param%%=*}
    lhs=${lhs//\%26/&amp;}
    lhs=${lhs//</&lt;}
    lhs=${lhs//&lt;br \/>/<br \/>}
    rhs=${param#*=}
    rhs=${rhs//\%26/&amp;}
    rhs=${rhs//</&lt;}
    rhs=${rhs//&lt;br \/>/<br \/>}
    echo "<tr><td>${lhs}</td><td>${rhs}</td></tr>"
  done
  echo "</table>"
#else
#  echo "<fieldset><legend>Debugging</legend>"
#  echo "<div class='whitebox'><pre>$QUERY_STRING</pre></div>"
#  echo "</fieldset>"
fi

echo "</div></body></html>"
