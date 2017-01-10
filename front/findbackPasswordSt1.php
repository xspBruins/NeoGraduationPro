<html>

<head>

  <meta charset="UTF-8">

  <title>FindBackPassword</title>

<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
  display: block;
}
body {
  line-height: 1;
}
ol, ul {
  list-style: none;
}
blockquote, q {
  quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
  content: '';
  content: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}
</style>

    <style>
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400);
.btn {
  display: block;
  width: 100%;
  padding: 14px 10px;
  margin-bottom: 0;
  line-height: 18px;
  color: #444;
  text-align: center;
  vertical-align: middle;
  background-color: #009FE3;
  cursor: pointer;
  border: none;
  color: white;
  font-size: 16px;
  font-weight: 300;
  transition: background-color 0.2s ease;
  outline: none;
}

.btn:hover, btn:focus {
  background-color: #007bb0;
}

.btn:active {
  background: #00587d;
  transform: translateY(1px);
  transition: none;
}

input {
  width: 100%;
  margin-bottom: 10px;
  background: #333;
  border: none;
  outline: none;
  padding: 14px 10px;
  font-size: 16px;
  font-weigth: 300;
  color: #fff;
  transition: background .2s ease;
}

input:hover {
  background: #363636;
}

input:focus {
  background: #444;
}

label {
  color: transparent;
  font: 0/0 a;
  text-shadow: none;
  display: block;
}

.Login-forgotLink {
  display: inline-block;
  float: right;
  color: #fff;
  text-decoration: none;
  border-bottom: 1px dotted #fff;
  margin: 10px 0;
  padding-bottom: 2px;
  font-size: 14px;
}

* {
  box-sizing: border-box;
}

html {
  width: 100%;
  height: 100%;
  overflow: hidden;
  -webkit-font-smoothing: antialiased;
}

body {
  width: 100%;
  height: 100%;
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 16px;
  font-weight: 300;
  background: #222;
}

.Login {
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -150px 0 0 -150px;
  width: 300px;
  height: 300px;
}

</style>

  <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="Login">
    <form method="post" action="doFind.php?act=fillInfro">
      <label for="Login-email">Account</label>
    	<input type="text" name="Account" id="Login-email" placeholder="Account（注册使用账号）" required="required" />
      <label for="Login-password">Email</label>
      <input type="text" name="Email" placeholder="Email（注册使用邮箱）" required="required" />
      <button type="submit" class="btn"><span>确定</span></button>
    </form>
</div>


</body>

</html>