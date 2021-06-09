
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:['wordtree']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          [ /*['Phrases'],
            ['cap are better than dogs'],
            ['cap eat kibble'],
            ['cap are better than hamsters'],
            ['cap are awesome'],
            ['cap are people too'],
            ['cap eat mice'],
            ['cap meowing'],
            ['cap in the cradle'],
            ['cap eat mice'],
            ['cap in the cradle lyrics'],
            ['cap eat kibble'],
            ['cap for adoption'],
            ['cap are family'],
            ['cap eat mice'],
            ['cap are better than kittens'],
            ['cap are evil'],
            ['cap are weird'],
            ['cap eat mice'],*/

            <?= $r ?>

          ]
        );

        var options = {
          wordtree: {
            format: 'implicit',
            word: 'cap'
          }
        };

        var chart = new google.visualization.WordTree(document.getElementById('wordtree_basic'));
        chart.draw(data, options);
      }
    </script>
