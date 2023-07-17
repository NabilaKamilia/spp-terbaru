<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        function pauseOthers(element){
            $("audio").not(element).each(function(index,audio){
                audio.pause();
            })
        }
    </script>

    <!-- Template Javascript -->
