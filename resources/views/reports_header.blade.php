@php
    $setting = DB::table('sitesettings')->first();
@endphp
<style>
    .header{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<div class="header">
    <h1 class="text-center" style="height: 51px;width: 62px;place-self: center;"><img style="height: 60px;"  src="{{Storage::url((!empty($setting))?$setting->logo:'')}}" alt=""></h1>
    <h1 class="text-center" style="height: 51px;/* width: 62px; */place-self: center;font-size: 20px;margin: 0;">{{(!empty($setting))?$setting->name:'Gym Master'}} - {{(!empty($setting))?$setting->slogan:'Gym Master'}}</h1>
</div>

