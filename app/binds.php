<?php 

App::bind('Mavidurak\GitHub\Interfaces\TwitterInterface', function() {
    return new Mavidurak\GitHub\Twitter();
});
