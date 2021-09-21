<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PC Gaming</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#marca').on('change',function(){
            var id_marca = $(this).val();
                if(id_marca){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'id_marca='+ id_marca,
                        success:function(html){
                            $('#model').html(html);
                        }
                    });
                }else{
                    $('#model').html('<option value="">Selecteaza marca prima data</option>');
                }
            });
            $('#model').on('change',function(){
            var id_model = $(this).val();
                if(id_model){
                    $.ajax({
                        type:'POST',
                        dataType: "json",
                        url:'ajaxData.php',
                        data:'id_model='+ id_model,
                        success: function(employeeData) {
                            var items = [];
                            for(var i = 0; i < employeeData.length; i++) {
                                items.push("<tr class='select-tr' onclick=window.location='selecteaza_categoria.php?id_pc="+employeeData[i].id+"'>");
                                items.push("<td>"+employeeData[i].procesor+"</td>");
                                items.push("<td>"+employeeData[i].placa_video+"</td>");
                                items.push("<td>"+employeeData[i].capacitate_ssd+"</td>");
                                items.push("</tr>");
                            }
                            $('#caracteristici tbody > tr').html("");;
                            $('<tbody/>', {html: items.join("")}).appendTo("table");
                            $( "tr.select-tr" ).css( "cursor", "pointer" );
                            $("tr").not(':first').hover(
                                function () {
                                    $(this).css("background","#d1d6b3");
                                },
                                function () {
                                    $(this).css("background","");
                                }
                            );
			            }
                    });
                }else{
                    $('table').hide();
                }
            });
        });
    </script>
</head>

<body>
    <?php
        include "navbar.php";
    ?>
    <main class="user-login comp">
        <div class="container select-car comp">
            <div class="row comp">
                <div class="col-lg-12 comp">
                    <form class="border border-light p-5 select-pc comp">
                        <p class="h4 mb-4 text-center comp">Selecteaza pc-ul dorit</p>
                        <?php
                        include 'mysql.php';
                        $query = $db->query("SELECT * FROM marca_pc");
                        $rowCount = $query->num_rows;
                        ?>
                        <select id="marca" class="browser-default custom-select mb-4 select-comp">
                            <option value="0" selected="">Selecteaza modelul de windows dorit</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){
                                    echo '<option value="'.$row['id_marca'].'">'.$row['nume'].'</option>';
                                }
                            }else{
                                echo '<option value="">Nici o marca</option>';
                            }
                            ?>
                        </select>

                        <select id="model" class="browser-default custom-select mb-4">
                            <option value="0" selected="">Selecteaza tipul de folosire dorit</option>
                        </select>
                        <table class="table table-borderless caracteristici" id="caracteristici">
                        <thead>
                            <tr>
                            <th scope="col" class="conp">Procesor</th>
                            <th scope="col" class="conp">Placa video</th>
                            <th scope="col" class="conp">Capacitate SSD</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    <main>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
