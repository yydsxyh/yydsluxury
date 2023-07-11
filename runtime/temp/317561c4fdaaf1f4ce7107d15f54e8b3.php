<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"/Users/lambor/Desktop/code/song/app/home/view/index/index.html";i:1682188850;}*/ ?>
﻿<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    .anticon {
      display: inline-block;
      color: inherit;
      font-style: normal;
      line-height: 0;
      text-align: center;
      text-transform: none;
      vertical-align: -0.125em;
      text-rendering: optimizeLegibility;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .anticon>* {
      line-height: 1;
    }

    .anticon svg {
      display: inline-block;
    }

    .anticon::before {
      display: none;
    }

    .anticon .anticon-icon {
      display: block;
    }

    .anticon[tabindex] {
      cursor: pointer;
    }

    .anticon-spin::before,
    .anticon-spin {
      display: inline-block;
      -webkit-animation: loadingCircle 1s infinite linear;
      animation: loadingCircle 1s infinite linear;
    }

    @-webkit-keyframes loadingCircle {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes loadingCircle {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" href="__HOME__/img/head.jpg">
  <title>kiko的歌单</title>
  <link href="__HOME__/css/common.css" rel="stylesheet">
  <link href="__HOME__/css/main.css" rel="stylesheet">
</head>

<body>
  <div id="app" data-v-app="">
    <div id="building"><page-header-wrapper>
        <div class="account-center-avatarHolder">
          <div class="ant-row">
            <div class="card">
              <div class="imgBx"><img src="__HOME__/img/head.jpg"></div>
              <div class="content">
                <div class="details">
                  <h2>kiko的歌单<br><span style="font-weight: bold;">点击歌名复制歌曲</span></h2>
                  <div class="data">
                    <h3><?php echo $count; ?><br><span>已收录</span></h3>
                    <h3><?php echo $new; ?><br><span>新上架</span></h3>
                  </div>
                  <div class="actionBtn"><button>直播间</button><button>个人空间</button></div>
                </div>
              </div>
            </div>
            <div class="ant-col ant-col-xs-15 ant-col-sm-3">
              <div class="zbDiv"></div>
            </div>
          </div>
        </div>
        <main class="ant-layout-content class2">
          <div class="ant-card" style="background-color: rgba(255, 192, 203, 0); height: 300%;">

            <div class="ant-card-body">
              <div class="ant-row">
                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="ant-col ant-col-xs-8 ant-col-sm-4">
                  <div class="fl2"><button class="button1" onclick="cate('<?php echo $vo['id']; ?>')"> <?php echo $vo['title']; ?> </button></div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
                <div class="ant-col ant-col-xs-8 ant-col-sm-4">
                  <div class="fl2"><button class="button1" onclick="cate(0)"> 全部 </button></div>
                </div>
                <div class="ant-col ant-col-xs-8 ant-col-sm-4">
                  <div class="fl2"></div>
                </div>
              </div>
            </div>
          </div><button class="button1" style="width: 100%;" onclick="random()"><svg t="1676708494801" class="icon" viewBox="0 0 1024 1024"
              version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2351" width="24" height="24">
              <path
                d="M391.528668 542.117931a240.941035 240.941035 0 1 1 0 481.882069 240.941035 240.941035 0 0 1 0-481.882069z m0 120.470517a120.470517 120.470517 0 1 0 0 240.941035 120.470517 120.470517 0 0 0 0-240.941035z"
                fill="#707070" p-id="2352"></path>
              <path
                d="M632.469702 180.706378l144.564621 108.423466a60.235259 60.235259 0 1 0 72.282311-96.376414l-240.941035-180.705776A60.235259 60.235259 0 0 0 511.999185 60.235861v722.823104a60.235259 60.235259 0 0 0 120.470517 0V180.706378z"
                fill="#707070" p-id="2353"></path>
            </svg>随便听听</button>
        </main>
        <div style="border-radius: 30px;margin:20px 20% 0;">
          <input type="search" id="search" autocomplete="off" placeholder="搜搜歌曲/歌手,共<?php echo $count; ?>首歌" style="width: 100%;">
          
        </div>
        <div class="tabgd">
          <div class="ant-table-wrapper">
            <div class="ant-spin-nested-loading">
              <div class="ant-spin-container">
                <div class="ant-table">
                  <div class="ant-table-container">
                    <div class="ant-table-content">
                      <table style="table-layout: auto;">
                        <colgroup>
                          <col style="width: 200px;">
                          <col style="width: 20px;">
                          <col style="width: 200px;">
                          <col style="width: 200px;">
                        </colgroup>
                        <thead class="ant-table-thead">
                          <tr>
                            <th class="ant-table-cell" colstart="0" colend="0"
                              style="margin-left: 100px; text-align: center;"><span><span
                                  style="font-size: 20px; font-weight: bold;">歌名</span></span>
                            </th>
                            <th class="ant-table-cell" colstart="1" colend="1"
                              style="margin-left: 100px; text-align: center;"><span><span
                                  style="font-size: 20px; font-weight: bold;">热度</span></span>
                            </th>
                            <th class="ant-table-cell" colstart="2" colend="2" style="text-align: center;"><span><span
                                  style="font-size: 20px; font-weight: bold;">歌手</span></span></th>
                            <th class="ant-table-cell" colstart="3" colend="3" style="text-align: center;"><span><span
                                  style="font-size: 20px; font-weight: bold;">类型</span></span></th>
                          </tr>
                        </thead>
                        <tbody class="ant-table-tbody">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="ant-back-top" style="display: none;"><img src="__HOME__/img/up.efda5c0b.png" style="height: 210%;"></div>
        </div>
      </page-header-wrapper>
      <footer style="font-weight: bold; color: rgb(240, 240, 240);padding-top: 50px;"><span>Copyright © 2023 kiko<span><span><br>
              <br>粤ICP备2023001719号</span></span></span></footer>
    </div>
  </div>
  <div>
    <div class="ant-notification ant-notification-topRight" id="popup"
      style="right: 0px; top: 24px; bottom: auto;transform: translate(-50%, -50%);display: none;">
      <div>
        <div class="ant-notification ant-notification-topRight" style="right: 0px; top: 24px; bottom: auto;">
          <div>
            <div class="ant-notification-notice ant-notification-notice-closable">
              <div class="ant-notification-notice-content">
                <div class="ant-notification-notice-with-icon">
                  <span class="ant-notification-notice-icon">
                    <span role="img" aria-label="smile" class="anticon anticon-smile" style="color: rgb(16, 142, 233);">
                      <svg focusable="false" class="" data-icon="smile" width="1em" height="1em" fill="currentColor"
                        aria-hidden="true" viewBox="64 64 896 896">
                        <path
                          d="M288 421a48 48 0 1096 0 48 48 0 10-96 0zm352 0a48 48 0 1096 0 48 48 0 10-96 0zM512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm263 711c-34.2 34.2-74 61-118.3 79.8C611 874.2 562.3 884 512 884c-50.3 0-99-9.8-144.8-29.2A370.4 370.4 0 01248.9 775c-34.2-34.2-61-74-79.8-118.3C149.8 611 140 562.3 140 512s9.8-99 29.2-144.8A370.4 370.4 0 01249 248.9c34.2-34.2 74-61 118.3-79.8C413 149.8 461.7 140 512 140c50.3 0 99 9.8 144.8 29.2A370.4 370.4 0 01775.1 249c34.2 34.2 61 74 79.8 118.3C874.2 413 884 461.7 884 512s-9.8 99-29.2 144.8A368.89 368.89 0 01775 775zM664 533h-48.1c-4.2 0-7.8 3.2-8.1 7.4C604 589.9 562.5 629 512 629s-92.1-39.1-95.8-88.6c-.3-4.2-3.9-7.4-8.1-7.4H360a8 8 0 00-8 8.4c4.4 84.3 74.5 151.6 160 151.6s155.6-67.3 160-151.6a8 8 0 00-8-8.4z">
                        </path>
                      </svg>
                    </span>
                  </span>
                  <div class="ant-notification-notice-message">


                  </div>
                  <div class="ant-notification-notice-description">"<span id="song_name"></span>"成功复制到剪切板</div>

                </div>
              </div>
              <a tabindex="0" class="ant-notification-notice-close" onclick="hidePopup()">
                <span class="ant-notification-close-x">
                  <span role="img" aria-label="close" class="anticon anticon-close ant-notification-close-icon">
                    <svg focusable="false" class="" data-icon="close" width="1em" height="1em" fill="currentColor"
                      aria-hidden="true" viewBox="64 64 896 896">
                      <path
                        d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 00203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z">
                      </path>
                    </svg>
                  </span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  // 获取页面元素和初始化变量
  const content = document.querySelector('.ant-table-tbody');
  let page = 1;
  let cate_id = 0;
  let key = '';
    loadData(page,cate_id,key);
  // 滚动事件处理程序
  window.addEventListener('scroll', () => {
    // 获取页面高度、滚动位置和视口高度
    const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

    // 判断是否滚动到底部
    if (scrollTop + clientHeight >= scrollHeight) {
      // 触发加载数据函数
      loadData(++page);
    }
  });

  // 加载数据函数
  function loadData(page,id,str = '') {
    const url = "<?php echo url('index/getLists'); ?>" + "?page=" + page + "&cate=" + id + "&key=" + str;
    // 发送 AJAX 请求
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log(data)
        if (data.code == 0 && data.data.length > 0) {
          data.data.forEach(element => {
            html = '';

            html = `<tr class="ant-table-row ant-table-row-level-0 white" onclick="copy('` + element.title + `')">
                            <td class="ant-table-cell" style="text-align: center;">`+ element.title + `</td>
                            <td class="ant-table-cell" style="text-align: center;">
                                <span class="ant-tag" style="border-width: 3px;">
                                    <span style="font-weight: bold; font-size: 15px;">`+ element.hot +`</span>
                                </span>
                            </td>
                            <td class="ant-table-cell" style="text-align: center;"><span
                               >`+ element.author + `</span></td>
                            <td class="ant-table-cell" style="text-align: center;"><span
                               >`+ element.typename + `</span></td>
                          </tr>`;

            content.insertAdjacentHTML('beforeend', html);

          });

        }
      })
      .catch(error => console.error(error));
  }

  function cate(id){
    cate_id = id
    page = 1;
    content.innerHTML = '';
    loadData(page,id,'');
  }

  function copy(textToCopy) {
    // 创建一个临时的 textarea 元素，并将要复制的文本作为其内容
    const tempTextarea = document.createElement('textarea');
    tempTextarea.value = '点歌 ' + textToCopy;

    // 将 textarea 元素添加到文档中
    document.body.appendChild(tempTextarea);

    // 选中 textarea 中的文本
    tempTextarea.select();

    // 执行复制命令并移除临时元素
    document.execCommand('copy');
    document.body.removeChild(tempTextarea);
    showPopup(textToCopy);
    setTimeout(function () {
      hidePopup();
    }, 2000);
    // 输出提示信息
    console.log(`"${textToCopy}" has been copied to clipboard.`);
  }

  function random(){
    const url = "<?php echo url('index/random'); ?>";
    // 发送 AJAX 请求
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log(data)
        if (data.code == 0 ) {
            copy(data.data);
        }
      })
      .catch(error => console.error(error));
  }

  function showPopup(text) {
    document.getElementById("popup").style.display = "block";
    document.getElementById("song_name").innerHTML = text;
  }

  function hidePopup() {
    document.getElementById("popup").style.display = "none";
  }

  function throttle(fn, delay) {
    let timer = null;
    return function() {
        const context = this;
        const args = arguments;
        if (!timer) {
        timer = setTimeout(function() {
            fn.apply(context, args);
            timer = null;
        }, delay);
        }
    };
    }
  const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', throttle(function(event) {
    const query = event.target.value.trim();
    content.innerHTML = '';
    if (query !== '') {
        key = query;
        page = 1;
        loadData(page,cate_id,query);
    } 
    }, 500));
</script>

</html>