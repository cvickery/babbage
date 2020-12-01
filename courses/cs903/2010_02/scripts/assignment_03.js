  console.log("The type of cs903 is '" + typeof cs903 + "'.");
  console.log("The type of window.cs903 is '" + typeof window.cs903 + "'.");
  console.log("cs903 = { };");
  cs903 = { };
  console.log("The type of cs903 is now '" + typeof cs903 + "'.");
  console.log("The type of window.cs903 is now '" + typeof window.cs903 + "'.");
  console.log("cs903 = function() { console.log('This is window.cs903'); };");
  cs903 = function() { console.log('This is window.cs903'); };
  console.log("The type of cs903 is now '" + typeof cs903 + "'.");
  console.log("The type of window.cs903 is now '" + typeof window.cs903 + "'.");
  cs903();
  window.cs903();

  console.log("The type of onload is '" + typeof onload + "'.");
  console.log("The type of window.onload is '" + typeof window.onload + "'.");
  console.log("onload = function() { console.log('This is window.onload'); };");
  onload = function() { console.log('This is window.onload'); };
  console.log("The type of onload is now '" + typeof onload + "'.");
  console.log("The type of window.onload is now '" + typeof window.onload + "'.");
  onload();
  window.onload();

