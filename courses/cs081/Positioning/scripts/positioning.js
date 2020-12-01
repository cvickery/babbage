var body, bodyWidth;
var off_top, off_bot, off_tb_none;
var off_left, off_right, off_lr_none;
var float_left, float_right, float_none;
var disp_none, disp_inline, disp_block;
var image;

window.onload = function()
{
  body = document.getElementsByTagName('body')[0];
  bodyWidth = body.offsetWidth;
  bodyHeight = body.offsetHeight;

  off_top = document.getElementById('off_top');
  off_bot = document.getElementById('off_bot');
  off_tb_none = document.getElementById('off_tb_none');
  off_top.onclick = update;
  off_bot.onclick = update;
  off_tb_none.onclick = update;
  
  off_left = document.getElementById('off_left');
  off_right = document.getElementById('off_right');
  off_lr_none = document.getElementById('off_lr_none');
  off_left.onclick = update;
  off_right.onclick = update;
  off_lr_none.onclick = update;

  float_left = document.getElementById('float_left');
  float_right = document.getElementById('float_right');
  float_none = document.getElementById('float_none');
  
  disp_none = document.getElementById('disp_none');
  disp_inline = document.getElementById('disp_inline');
  disp_block = document.getElementById('disp_block');
  disp_none.onclick = update;
  disp_inline.onclick = update;
  disp_block.onclick = update;

  image = document.getElementById('image');
  imageWidth = image.offsetWidth;
  imageHeight = image.offsetHeight;

}

function update()
{
  if (disp_none.checked)    image.style.display = "none";
  if (disp_inline.checked)  image.style.display = "inline";
  if (disp_block.checked)   image.style.display = "block"

  if (off_top.checked)      image.style.top = "0";
  if (off_bot.checked)      image.style.bottom = "0";
  if (off_left.checked)     image.style.left = "0";
  if (off_right.checked)    image.style.right = "0";
}
