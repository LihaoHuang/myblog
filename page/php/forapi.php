		var map;		//定義地圖對象
		var markers=[];		//記錄所有景點的Maker訊息
		var infoWindow = new google.maps.InfoWindow();		//氣泡窗
		var information = "虎尾科技大學聯絡資訊:<br>地址:632雲林縣虎尾鎮文化路64號<br>電話:05 631 5000"
		var px;			//定義x座標數據
		var py;			//定義y座標數據
		var ptitle;		//定義title內容
		var pcontents;		//定義comtents內容

	<?php	include '../php/mysql_connect_map.php';	?>

		//設定初始數據
	function initialize(){
		//將地圖定位在虎科
		var mapOptions = {
			center: new google.maps.LatLng(23.701864,120.430957),
			zoom: 16
		};
		//加載並初始化地圖
		map = new google.maps.Map(
			document.getElementById('map-canvas'),
			mapOptions);
		//加載地點座標
		loadMap();
	
		//加載景點標記
		addMarker();
		}
	
		function loadMap() 
		{ 
			
			px = ['<?php echo join('\', \'', $px); ?>'];
			py = ['<?php echo join('\', \'', $py); ?>'];
			ptitle = ['<?php echo join('\', \'', $ptitle); ?>'];
			pcontents = ['<?php echo join('\', \'', $pcontents); ?>'];
			console.log("px :" +px);
			console.log("py :" +py);
			console.log("ptitle :" +ptitle);
			console.log("pcontents :" +pcontents);

		}
		function addMarker(){
			for(var i=0;i<<?php echo $pnumber; ?> ;i++){
				var point = new google.maps.LatLng(px[i],py[i]);
				//設定點選地圖標記後的對話氣泡框的內容
				var name = "<h3>" + ptitle[i] + "</h3><p>"+ pcontents[i] +"</p>";
				var marker = new google.maps.Marker({
					position: point,
					map: map,
					title: ptitle[i],
					icon: 'flag.png',
					visible: true
				});
			bindInfoWindow(marker, map, infoWindow, name);
			markers.push(marker);
			}
		}

		function bindInfoWindow(marker,map,infoWindow,title){
			google.maps.event.addListener(marker,'click',function(){
				infoWindow.setContent(title);
				infoWindow.open(map,marker);
			});
		}

