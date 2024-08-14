<style>
    .calendar-body{
    width: 90%;
    height: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto;

    /* Assuming the month element has a class of "month-header" */
.month-header {
  background-color: transparent !important;
}
   
}
</style>
<form action="" method="post">

        <div class="calendar-body">
            <h1 style="color:white; size:20px">Calendar</h1><br>

            <div id="calendar"></div>

        <!--JS for calendar-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="evo-calendar.min.js"></script>


        <!--CSS for Calendar-->
        <link rel="stylesheet" type="text/css" href="evo-calendar.min.css">
        <link rel="stylesheet" type="text/css" href="evo-calendar-midnight-blue.min.css">


        <!--JS for calendar-->
        <script>
            $(document).ready(function() {
                $('#calendar').evoCalendar({
                    theme: "Midnight Blue" 
                })
            })
        </script>

</div>
</form>