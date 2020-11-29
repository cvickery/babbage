
//  Use function foo() to display the types of various ?things"
console.log("foo([ ]);");  //   An array (which is an object)
foo([ ]);
console.log("foo({ });");  //  An object that is not an array
foo({ });
console.log("foo(123);"); //  A number
foo(123);
console.log("foo('1');");  //  A string
foo('1');
console.log("foo(foo);");  //  A function
foo(foo);

//  Initial definition of the function foo(), called by above sequence of function calls.
function foo(param)
{
  console.log("foo: param is of type '" + typeof param + "'.");
}

//  Change the definition of foo() to another function that can tell the difference
//  between an array and an object.
foo = function(param)
{
  if ( (typeof param === "object") && (typeof param.length === "number") )
  {
    console.log("foo: param is an array");
  }
  else if (typeof param === "object")
  {
    console.log("foo: param is an object");
  }
  else
  {
    console.log("foo: param is neither an array nor an object");
  }
}

//  Same set of tests as at the beginning, but now the first item should be identified as
//  an array rather than as an object. All other outputs should be the same as above.
console.log("foo([ ]);");
foo([ ]);
console.log("foo({ });");
foo({ });
console.log("foo(123);");
foo(123);
console.log("foo('1');");
foo('1');
console.log("foo(foo);");
foo(foo);

//  Third and fourth versions of foo(), combined. The third version sums the numeric elements
//  of array objects, and the fourth version adds to that the summing of the numeric elements
//  of non-array objects
foo = function(param)
{
  //  always initialize the sum
  var sum = 0;
  if ( (typeof param === "object") && (typeof param.length === "number") )
  {
    console.log("foo: param is an array");
    for (var i = 0; i < param.length; i++)
    {
      if (typeof param[i] === 'number' ) sum += param[i];
    }
    console.log("  foo: the sum of the numeric elements in the array is: " + sum);
  }
  else if (typeof param === "object")
  {
    console.log("foo: param is an object");
    for (var property in param)
    {
      console.log ("  foo: param." + property + " is of type '" + typeof param[property] + "'");
      if (typeof param[property] === "number")
      {
        sum += param[property];
      }
    }
    console.log("  foo: The sum of the numeric properties is " + sum);
  }
  else
  {
    console.log("foo: param is neither an array nor an object");
  }
}

//  Test the third/fourth version of foo()
//  Note: you should experiment with different sets of arguments in addition to these.
console.log("foo([100, 20, 3, 'hello']);");
foo([100, 20, 3, 'hello']);
console.log("foo({a:100, b:'20', c:20, d:3});");
foo({a:100, b:'20', c:20, d:3});
console.log("foo(123);");
foo(123);
console.log("foo('1');");
foo('1');
console.log("foo(foo);");
foo(foo);

//  Extra: demonstrate printing out the names and values of the properties of an object.
var object = { a:3, b:5, c:"hello", a_long_property_name:7 };
for (var property_name in object)
{
  console.log("object." + property_name + " has the value " + object[property_name]);
}
