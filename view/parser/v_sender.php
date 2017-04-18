<center><h2><?=$title?></h2></center>
<div class="start-btn col-md-12 text-center">
    <button type="button" id="start" class="btn btn-success">Начать парсинг</button>
    <p>Страниц в задании: <span class="count"><?=count($data)?></span></p>
  </div>
  <div class="col-md-12">


    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="3" aria-valuemin="0" style="width: 0%">
      </div>
    </div>

    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Статистика</h3>
      </div>
      <div class="panel-body">
        <div id="all"><p>Сделано: <span id="progress">0</span> / <span class="count"><?=count($data)?></span></p></div>
        <div class="well" id="log"></div>
      </div>
    </div>
</div>