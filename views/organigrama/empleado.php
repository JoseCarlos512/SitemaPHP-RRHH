<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  



<body>
<div  style="display: none">


<ul id="mainContainer" class="clearfix"></ul>	
  	
</div>
<div id="main">
	
</div>
  
  
</body>



<?php require_once 'views/layout/footer.php'; ?>


<script type='text/javascript'>
    $(function () {
        var members;
        $.ajax({
            url: '<?=base_url?>views/Empleado/load.php',
            async: false,
            success: function (data) {
                members = $.parseJSON(data)
            }
        })

        //memberId,parentId,otherInfo
        for (var i = 0; i < members.length; i++) {

            var member = members[i];

            if (i == 0) {
                $("#mainContainer").append("\
                        <li id=" + member.memberId + ">" 
                            + member.otherInfo + 
                            "<br>" +
                            "<img class='thumb-image' height='35px' width='35px' \n\
                            src='<?= base_url ?>images/usuario/sinPerfil.jpg' alt='image' />" + "\
                        </li>")
            } else {

                if ($('#pr_' + member.parentId).length <= 0) {
                    $('#' + member.parentId).append("<ul id='pr_" + member.parentId + "'><li id=" + member.memberId + ">" + member.otherInfo + "<br>" + 
                     "<img class='thumb-image' height='35px' width='35px' \n\
                            src='<?= base_url ?>images/usuario/" + member.imagen + "' alt='image' />" +        
                    "</li></ul>")
                } else {
                    $('#pr_' + member.parentId).append("<li id=" + member.memberId + ">" + member.otherInfo + "<br>" + 
                            "<img class='thumb-image' height='35px' width='35px' \n\
                            src='<?= base_url ?>images/usuario/" + member.imagen + "' alt='image' />"
                            + "</li>")
                }

            }
        }




        $("#mainContainer").orgChart({container: $("#main"), interactive: true, fade: true, speed: 'slow'});

    });


</script>