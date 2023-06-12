<style>
    button {
        background-color: #7FB3D5;
        color: white;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
    }

    .inscrito {
        background-color: #8BC34A;
    }

    .retirado {
        background-color: #7FB3D5;
    }

    .oculto {
        display: none;
    }
</style>
<script>
    var contadorInscripciones = 0;

    function inscribirse(elemento) {
        if (contadorInscripciones >= 2) {
            return;
        }

        contadorInscripciones++;

        elemento.classList.add('inscrito');
        elemento.classList.remove('retirado');
        elemento.textContent = 'Inscrito';

        var materiasSeleccionadas = document.getElementById('materiasSeleccionadas');
        if (elemento.value !== '') {
            materiasSeleccionadas.value += ',' + elemento.value;
        }

        console.log('====================================');
        console.log(materiasSeleccionadas.value);
        console.log('====================================');

        var retirarseButton = elemento.nextElementSibling;
        retirarseButton.classList.remove('oculto');
    }

    function retirarse(elemento) {

        var sigla_materia = elemento.value;

        contadorInscripciones--;

        var materiasSeleccionadas = document.getElementById('materiasSeleccionadas');

        var array = materiasSeleccionadas.value.split(",");
        array = array.filter(function(elemento) {
            return elemento !== '';
        });

        if (sigla_materia !== '') {
            var index = array.indexOf(sigla_materia);
            if (index !== -1) {
                array.splice(index, 1);
            }
        }
        materiasSeleccionadas.value = array.join(', ');

        console.log('====================================');
        console.log(materiasSeleccionadas.value);
        console.log('====================================');

        var inscribirseButton = elemento.previousElementSibling;
        inscribirseButton.classList.remove('oculto');
        inscribirseButton.classList.remove('inscrito');
        inscribirseButton.classList.add('retirado');
        inscribirseButton.textContent = 'Inscribirse';

        elemento.classList.add('oculto');
    }
</script>

<script>
    var botonesInscribirse = document.querySelectorAll('button[onclick="inscribirse(this)"]');

    if (contadorInscripciones >= 2) {
        botonesInscribirse.forEach(function(button) {
            button.disabled = true;
        });
    }
</script>


<!-- js section -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="js/jquery.min.js"></script>
<script src="js/inscripcion.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="js/menumaker.js"></script>
<!-- wow animation -->
<script src="js/wow.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<!-- revolution js files -->
<script src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="revolution/js/extensions/revolution.extension.video.min.js"></script>

</body>

</html>