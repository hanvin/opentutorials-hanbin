<?php
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = ".$_GET['id'];
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style type="text/css">
            body {
                font-size: 0.8em;
                font-family: dotum;
                line-height: 1.6em;
            }
            body.black {
                background-color: black;
                color: white;
            }
            body.black a {
                color: white;
            }
            body.black a:hover {
                color: #f60;
            }
            body.black header {
                border-bottom: 1px solid #333;
            }
            body.black nav {
                border-right: 1px solid #333;
            }
            header {
                border-bottom: 1px solid #ccc;
                padding: 20px 0;
            }
            #toolbar {
                padding: 10px;
                float: right;
            }
            nav {
                float: left;
                margin-right: 20px;
                min-height: 500px;
                border-right: 1px solid #ccc;
            }
            nav ul {
                list-style: none;
                padding-left: 0;
                padding-right: 20px;
            }
            article {
                float: left;
                padding-top: 20px;
            }
            footer {
                clear: both;
            }
            a {
                text-decoration: none;
            }
            a:link, a:visited {
                color: #333;
            }
            a:hover {
                color: #f60;
            }
            h1 {
                font-size: 1.4em;
            }
          
        </style>
    </head>
  
    <body id="body">
        <div>
            <header>
                <h1>JavaScript</h1>
            </header>
            <div id="toolbar">
                <input type="button" value="black" onclick="document.getElementById('body').className='black'" />
                <input type="button" value="white" onclick="document.getElementById('body').className='white'" />
            </div>
            <nav>
                <ul>
                    <?php
                    $sql="select id,title from topic";
                    $result=mysql_query($sql);
                    while($row=mysql_fetch_assoc($result)) {
                    echo "
                    <li>
                        <a href=\"http://localhost/opentutorials/index.php?id={$row['id']}\">{$row['title']}</a></li>";
                        }
                        ?>
                </ul>
            </nav>
            <h1>추가할 토픽을 작성하세요</h1>
            <article>
				<form action="add_process.php" method="post">
					<table>
					<tr>
						<td>제목</td>
						<td> <input type="text" size="40" name="title"/></td>
					</tr>
					<tr>
						<td>본문</td>
						<td> <textarea name="description" cols="50" rows="10"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td align="center">
							<input type="submit" value="제출"/></td>
					</tr>
					</table>
				</form>
            </article>
        </div>
    </body>
</html>
