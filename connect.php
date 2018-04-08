<?php
$link = mysqli_connect("localhost:8889", "root", "root");
if (!$link)
{
    echo "<script type='text/javascript'>alert('В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.');</script>";
    exit();
}
$db=mysqli_select_db($link,"gen");
if(!$db)
{
    if (mysqli_query($link, "CREATE DATABASE gen"))
    {
        echo "<script type='text/javascript'>alert('Database created successfully');</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error creating database:');</script>" . mysqli_error($link);
    }
}
else
{
    echo "<script type='text/javascript'>alert('База данных успешно подключена');</script>";
}
?>