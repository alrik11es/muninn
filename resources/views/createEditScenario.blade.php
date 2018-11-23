@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Create a scenario</div>

        <div class="card-body">

            <form class="new_scenario" id="new_scenario" action="/scenarios" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="nE3Fw/jQe2P/wzHmRLC9+51ApOcAn8cF0Zp9xKC5LkfIAn61KlbrZ3EQHlqzmSmnep4kmaz+Y1LViFAMAUqCVw==">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="scenario_name">Name</label>
                            <input class="form-control" placeholder="Name your Scenario" type="text" name="scenario[name]" id="scenario_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="scenario_tag_bg_color">Tag Background Color</label>
                            <input class="form-control" value="#5BC0DE" type="color" name="scenario[tag_bg_color]" id="scenario_tag_bg_color">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="scenario_tag_fg_color">Tag Foreground Color</label>
                            <input class="form-control" value="#FFFFFF" type="color" name="scenario[tag_fg_color]" id="scenario_tag_fg_color">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="scenario_description">Optional Description</label>
                            <textarea rows="10" class="form-control" placeholder="Optionally describe what this Scenario will do.  If this will be public, you should also include some contact information." name="scenario[description]" id="scenario_description"></textarea>
                        </div>

                        <div class="checkbox">
                            <label for="scenario_public">
                                <input name="scenario[public]" type="hidden" value="0"><input type="checkbox" value="1" name="scenario[public]" id="scenario_public"> Share this Scenario publicly
                            </label>        <span class="glyphicon glyphicon-question-sign hover-help" data-content="When selected, this Scenario and all Agents in it will be made public.  An export URL will be available to share with other Huginn users.  Be very careful that you do not have secret credentials stored in these Agents' options.  Instead, use Credentials by reference." data-original-title="" title=""></span>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <label for="scenario_icon">Icon</label>
                                <div class="select2-container" id="s2id_scenario_icon" style="font-family: FontAwesome, Arial; width: 100%;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-2">Gear</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen2" class="select2-offscreen">Icon</label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-2" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen2_search" class="select2-offscreen">Icon</label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-2" id="s2id_autogen2_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-2">   </ul></div></div><select style="font-family: FontAwesome, Arial; display: none;" class="select2-fountawesome-icon" name="scenario[icon]" id="scenario_icon" tabindex="-1" title="Icon"><option data-icon="fa-gear" value="gear">Gear</option>
                                    <option data-icon="fa-globe" value="globe">Globe</option>
                                    <option data-icon="fa-adjust" value="adjust">Adjust</option>
                                    <option data-icon="fa-camera" value="camera">Camera</option>
                                    <option data-icon="fa-glass" value="glass">Glass</option>
                                    <option data-icon="fa-music" value="music">Music</option>
                                    <option data-icon="fa-heart" value="heart">Heart</option>
                                    <option data-icon="fa-star" value="star">Star</option>
                                    <option data-icon="fa-film" value="film">Film</option>
                                    <option data-icon="fa-signal" value="signal">Signal</option>
                                    <option data-icon="fa-home" value="home">Home</option>
                                    <option data-icon="fa-automobile" value="automobile">Automobile</option>
                                    <option data-icon="fa-clock-o" value="clock-o">Clock</option>
                                    <option data-icon="fa-road" value="road">Road</option>
                                    <option data-icon="fa-inbox" value="inbox">Inbox</option>
                                    <option data-icon="fa-lock" value="lock">Lock</option>
                                    <option data-icon="fa-flag" value="flag">Flag</option>
                                    <option data-icon="fa-spoon" value="spoon">Spoon</option>
                                    <option data-icon="fa-barcode" value="barcode">Barcode</option>
                                    <option data-icon="fa-book" value="book">Book</option>
                                    <option data-icon="fa-building" value="building">Building</option>
                                    <option data-icon="fa-video-camera" value="video-camera">Video Camera</option>
                                    <option data-icon="fa-photo" value="photo">Photo</option>
                                    <option data-icon="fa-headphones" value="headphones">Headphones</option>
                                    <option data-icon="fa-gift" value="gift">Gift</option>
                                    <option data-icon="fa-leaf" value="leaf">Leaf</option>
                                    <option data-icon="fa-fire" value="fire">Fire</option>
                                    <option data-icon="fa-eye" value="eye">Eye</option>
                                    <option data-icon="fa-language" value="language">Language</option>
                                    <option data-icon="fa-key" value="key">Key</option>
                                    <option data-icon="fa-paw" value="paw">Paw</option>
                                    <option data-icon="fa-tags" value="tags">Tags</option>
                                    <option data-icon="fa-dashboard" value="dashboard">Dashboard</option>
                                    <option data-icon="fa-camera-retro" value="camera-retro">Camera Retro</option>
                                    <option data-icon="fa-plane" value="plane">Plane</option>
                                    <option data-icon="fa-calendar" value="calendar">Calendar</option>
                                    <option data-icon="fa-bullhorn" value="bullhorn">Bullhorn</option>
                                    <option data-icon="fa-gears" value="gears">Gears</option>
                                    <option data-icon="fa-bell" value="bell">Bell</option>
                                    <option data-icon="fa-gavel" value="gavel">Gavel</option>
                                    <option data-icon="fa-tachometer" value="tachometer">Tachometer</option>
                                    <option data-icon="fa-bank" value="bank">Bank</option>
                                    <option data-icon="fa-coffee" value="coffee">Coffee</option>
                                    <option data-icon="fa-cutlery" value="cutlery">Cutlery</option>
                                    <option data-icon="fa-table" value="table">Table</option>
                                    <option data-icon="fa-magic" value="magic">Magic</option>
                                    <option data-icon="fa-truck" value="truck">Truck</option>
                                    <option data-icon="fa-pencil" value="pencil">Pencil</option>
                                    <option data-icon="fa-cloud" value="cloud">Cloud</option>
                                    <option data-icon="fa-scissors" value="scissors">Scissors</option></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <label for="scenario_agents">Agents</label>
                                <input name="scenario[agent_ids][]" type="hidden" value=""><div class="select2-container select2-container-multi form-control" id="s2id_scenario_agent_ids" style="width: 360px;"><ul class="select2-choices">  <li class="select2-search-field">    <label for="s2id_autogen1" class="select2-offscreen"></label>    <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" id="s2id_autogen1" style="width: 34px;" placeholder="">  </li></ul><div class="select2-drop select2-drop-multi select2-display-none">   <ul class="select2-results">   <li class="select2-no-results">No matches found</li></ul></div></div><select multiple="multiple" size="5" class="select2-linked-tags form-control" data-url-prefix="/agents" name="scenario[agent_ids][]" id="scenario_agent_ids" tabindex="-1" style="display: none;"><option value="22">Agua Embalsada</option>
                                    <option value="21">AEMET Reader</option>
                                    <option value="20">Infoclases Reader</option>
                                    <option value="19">ClasesDefaultFormater(URL,TEXT)</option>
                                    <option value="17">TusClasesParticulares Reader</option>
                                    <option value="16">Telegram Collector Clases</option>
                                    <option value="15">Formateo Sismología</option>
                                    <option value="13">Sismologia</option>
                                    <option value="12">SpaceWeather Scraper</option>
                                    <option value="11">Formateo METEO</option>
                                    <option value="10">Leer alertas meteo</option>
                                    <option value="8">Telegram Collector</option>
                                    <option value="7">Comic Formatter</option>
                                    <option value="5">SF Weather Agent</option>
                                    <option value="4">Morning Digest</option>
                                    <option value="3">Afternoon Digest</option>
                                    <option value="1">Rain Notifier</option></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-actions" style="clear: both">
                            <input type="submit" name="commit" value="Save Scenario" class="btn btn-primary" data-disable-with="Save Scenario">
                        </div>
                    </div>
                </div>
            </form>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default" href="/scenarios"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
