1. 基本上不用增加 Controller，只要在 view/pages 下加入 自己負責的 view，例如 : show.php，就可以自己連過去了

2. route 如果有要新增頁面，一律改成 $route['abc'] = 'pages/view/abc';，abc 為你 view 的名稱

3. 可以直接在自己的 view 上自訂 css

4. header 以及 footer 基本上應該不會動到