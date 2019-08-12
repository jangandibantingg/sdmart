<div class="row">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-body">
 <!-- Include the library. -->
 <script
   src="https://unpkg.com/github-calendar@latest/dist/github-calendar.min.js"
 ></script>

 <!-- Optionally, include the theme (if you don't want to struggle to write the CSS) -->
 <link
    rel="stylesheet"
    href="https://unpkg.com/github-calendar@latest/dist/github-calendar-responsive.css"
 />

 <!-- Prepare a container for your calendar. -->
 <div class="calendar">
     <!-- Loading stuff -->
     <img src="https://loading.io/spinners/ellipsis/lg.discuss-ellipsis-preloader.gif" alt="">
 </div>

 <script>
     GitHubCalendar(".calendar", "aang-naja");
     // or enable responsive functionality
     GitHubCalendar(".calendar", "aang-naja", { responsive: true });
 </script>
</div>
</div>
</div>
</div>
