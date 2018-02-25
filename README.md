# jumlah-penduduk-tingkat-pendidikan

[![Join the chat at https://gitter.im/jumlah-penduduk-tingkat-pendidikan/Lobby](https://badges.gitter.im/jumlah-penduduk-tingkat-pendidikan/Lobby.svg)](https://gitter.im/jumlah-penduduk-tingkat-pendidikan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-tingkat-pendidikan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-tingkat-pendidikan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-tingkat-pendidikan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-tingkat-pendidikan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/v/stable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)
[![Total Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/downloads)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/v/unstable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)
[![License](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/license)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/d/monthly)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-tingkat-pendidikan/d/daily)](https://packagist.org/packages/bantenprov/jumlah-penduduk-tingkat-pendidikan)

Jumlah penduduk berdasarkan tingkat pendidikan per desa/kelurahan

### install via composer

- Development snapshot
```bash
$ composer require bantenprov/jumlah-penduduk-tingkat-pendidikan:dev-master
```
- Latest release:


### download via github

~~~bash
$ git clone https://github.com/bantenprov/jumlah-penduduk-tingkat-pendidikan.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    
    //....
    Bantenprov\JPTingkatPendidikan\JPTingkatPendidikanServiceProvider::class

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=jumlah-penduduk-tingkat-pendidikan-assets
$ php artisan vendor:publish --tag=jumlah-penduduk-tingkat-pendidikan-public
```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/jumlah-penduduk-tingkat-pendidikan',
    components: {
      main: resolve => require(['./components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/DashboardJPTingkatPendidikan.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Jumlah Penduduk Tingkat Pendidikan"
    }
  }
  //== ...
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
        path: '/admin/dashboard/jumlah-penduduk-tingkat-pendidikan',
        components: {
          main: resolve => require(['./components/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanAdmin.show.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Jumlah Penduduk Tingkat Pendidikan"
        }
    },
 //== ...   
  ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      link: '/dashboard',
      icon: 'fa fa-angle-double-right'
    },
    {
      name: 'Entity',
      link: '/dashboard/entity',
      icon: 'fa fa-angle-double-right'
    },
    //== ...
    {
      name: 'Jumlah Penduduk Tingkat Pendidikan',
      link: '/dashboard/jumlah-penduduk-tingkat-pendidikan',
      icon: 'fa fa-angle-double-right'
    }
  ]
},
{
  name: 'Admin',
  icon: 'fa fa-lock',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      icon: 'fa fa-angle-double-right',
      child: [
        {
          name: 'Home',
          link: '/admin/dashboard/home',
          icon: 'fa fa-angle-right'
        },
        //== ...
        {
          name: 'Jumlah Penduduk Tingkat Pendidikan',
          link: '/admin/dashboard/jumlah-penduduk-tingkat-pendidikan',
          icon: 'fa fa-angle-right'
        }
      ]
    },
  ]
}
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript

//== Jumlah Penduduk Berdasarkan Tingkat Pendidikan

import JPTingkatPendidikan from './components/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikan.chart.vue';
Vue.component('echarts-jumlah-penduduk-tingkat-pendidikan-ktp', JPTingkatPendidikan);

import JPTingkatPendidikanKota from './components/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanKota.chart.vue';
Vue.component('echarts-jumlah-penduduk-tingkat-pendidikan-kota', JPTingkatPendidikanKota);

import JPTingkatPendidikanTahun from './components/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanTahun.chart.vue';
Vue.component('echarts-jumlah-penduduk-tingkat-pendidikan-ktp-tahun', JPTingkatPendidikanTahun);

//== mini bar charts

import JPTingkatPendidikanBar01 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanBar01.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-bar-01', JPTingkatPendidikanBar01);

import JPTingkatPendidikanBar02 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanBar02.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-bar-02', JPTingkatPendidikanBar02);

import JPTingkatPendidikanBar03 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanBar03.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-bar-03', JPTingkatPendidikanBar03);

//== mini pie charts

import JPTingkatPendidikanPie01 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanPie01.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-pie-01', JPTingkatPendidikanPie01);

import JPTingkatPendidikanPie02 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanPie02.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-pie-02', JPTingkatPendidikanPie02);

import JPTingkatPendidikanPie03 from './components/views/bantenprov/jumlah-penduduk-tingkat-pendidikan/JPTingkatPendidikanPie03.vue';
Vue.component('jumlah-penduduk-tingkat-pendidikan-pie-03', JPTingkatPendidikanPie03);
```