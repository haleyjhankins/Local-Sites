<?php

class RedirectEditorUtils
{
    public function getVersion()
    {
        return str_replace(".", "", get_bloginfo('version'));
    }

    public function getPlugins()
    {
        $plugin= get_plugins();
        //  write_log($plugin);
        $results=array();

        foreach ($plugin as $key => $value) {
            $result= new RedirectEditorComponent();
            $name_parts=explode("/", $key);
            $name=$name_parts[0];
            $result->name=$name;
            $result->version=$value['Version'];
            array_push($results, $result);
        }

        return $results;
    }
    public function getThemes()
    {
        $themes= wp_get_themes();
        $results=array();

        foreach ($themes as $key => $value) {
            $result= new RedirectEditorComponent();
            $result->name=$key;
            $result->version=$value->Version;
            array_push($results, $result);
        }

        return $results;
    }

    public function getComponents()
    {
        $result= new RedirectEditorComponents();
        $result->wp_version=$this->getVersion();
        $result->plugins=$this->getPlugins();
        $result->themes=$this->getThemes();
        return htmlspecialchars(json_encode($result), ENT_QUOTES, 'UTF-8');
    }
}

class RedirectEditorComponent{
  public $name;
  public $version;
}
class RedirectEditorComponents{
  public $wp_version;
  public $plugins=array();
  public $themes=array();
}
class RedirectEditorScan{
  public $status;
  public $scan_id;
}
