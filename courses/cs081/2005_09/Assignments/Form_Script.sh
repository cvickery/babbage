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
echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"print\""
echo "  href=\"/courses/css/style-print.css\" />"

echo "</head><body><div id=\"header\"><h1>Form Processing Script: Bash Version</h1>"
echo "</div><div id=\"content\">"
case $REQUEST_METHOD in

  POST) echo "<h2>The Request Method was POST</h2>"
        read QUERY_STRING
        ;;
  GET)  echo "<h2>The Request Method was GET</h2>"
        ;;
  *)    echo "<h2>There Was No Request Method</h2>"
        ;;
esac
QUERY_STRING=$(echo "$QUERY_STRING" | tr "+" " ")
QUERY_STRING=$(echo "$QUERY_STRING" | ./unescape)
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
    echo "<tr><td>${param%%=*}</td><td>${param#*=}</td></tr>"
  done
  echo "</table>"
fi
echo "</div></body></html>"
