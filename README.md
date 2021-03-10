# :exclamation:ErrorStocker
ErrorStockerとは、文字通りエラーを保存する為のアプリケーションです。『エラーが生じた際に、情報を探して解決に導く』この作業を短縮できればより多くのタスクをこなすことができると考えました。一度経験したエラーや勉強した内容等を一つの場所に集めておけば見直すことができるのでそれを形にしたものです。

<br />

## :globe_with_meridians: URL
URL: http://error-st.com


使用方法は閲覧用とログインして使用できる２パターンがあります。閲覧用は、閲覧Buttonをクリックすると使用できます。ただ、投稿することはできません。投稿する場合はログインしてからしかできません。投稿をする際は、タイトル・タグ（任意）・写真（任意）・内容を投稿することができます。内容を記述する際は、markdown記法で投稿できるようにしてます。

<br />

## :bust_in_silhouette: テストアカウント

|名　前|メールアドレス|パスワード|
|:----------:|:----------------:|:------------:|
|test|test@test.com|testtest|


<br />

## :thought_balloon: 制作背景
エラーが生じた際にリファレンスサイト・Qiita等から解決策を探して解決に導くこの流れで開発に励んでいました。
一度エラーを解決した内容や勉強した内容等をGoogleのブックマークやQiitaでストックしておりましたが、どこにその情報を入れたかといった自体がありました。
そこで、不便に感じていた箇所をより楽にすることを目指して作成し具現化したものがこのサイトです。
他の人が投稿した発信やその他質問の回答を自分のファイルに入れていく感覚で使用したと考えたため作成に至りました。これを使用することで時間の短縮につながると考えております

<br />

## :open_file_folder:機能動作

|新規投稿|投稿一覧|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/b8dd6a7350770b9dba1144ca90415e06.png)|![Image from Gyazo](https://i.gyazo.com/949997d7f695203026d5510d031a7160.png)|

|投稿詳細|マイページ詳細|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/dd4d4be0777cb65499f395c929ee4f79.png)|![Image from Gyazo](https://i.gyazo.com/a8bd6f944fff2a68d0a0fb0923435d08.png)|

|検索画面|コメント画面|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/d44ba633c6f62d76e2c9318652e0a8bf.png)|![Image from Gyazo](https://i.gyazo.com/d68ce695f76e993b0f249d4e863e4423.png)|

### スマホ対応画面一覧
|投稿一覧|投稿詳細|検索画面|
|---|---|---|
|![Image from Gyazo](https://i.gyazo.com/76774a0a5f45a7b07600900c94cb6d56.png)|![Image from Gyazo](https://i.gyazo.com/6efacd3e624ba448dffc7b2af1025d0c.png)|![Image from Gyazo](https://i.gyazo.com/453e9f568452698271a6736d29723866.png)|


<br />

## :green_book:機能一覧

### ユーザー機能
- ユーザー登録（投稿用ログイン）
- ゲストログイン（閲覧用ログイン）
- マイページにて以下の投稿の一覧表示
  - 自分の投稿内容

### 投稿機能
- エラーのストックをログインアカウントが投稿・編集・削除
- 一覧表示、詳細表示
- 投稿一覧表示で10個の投稿数をページネーションを実施
- タグ付け（タグ検索）
- キーワード検索（タイトル・内容）
- 投稿内容にマークダウンを採用（cebe/markdown）

### コメント機能
- 投稿にコメントを投稿・編集・削除
- 投稿詳細ページにコメント一覧表示
- コメント内容にマークダウンを採用（cebe/markdown）



## :notebook:使用技術
### フロントエンド
- HTML / CSS / Bootstrap

### バックエンド
- PHP 8.0.2
- Laravel 8.28.1

### データベース
- Mysql 8.0  

### 開発環境
- Docker 20.10.2
- docker-compose 1.27.4

### 本番環境
- AWS(VPC、EC2、S3、Route53) 
- Nginx

<br />

## :closed_book:ER図
![Image from Gyazo](https://i.gyazo.com/1f0df171bea0f09482a0e037d8161c08.png)

## :orange_book:インフラ図
![Image from Gyazo](https://i.gyazo.com/347d5195435c9fd06dcc9ef553f85b1b.png)


## :bulb:今後の課題
- Vue.jsの導入
  - 検索機能の非同期通信
  - コメント機能の非同期通信
  - 新規投稿画面にプレビュー画面導入 
- フォロー機能の導入
- テストコードの導入
- マイページのみの検索機能導入
- ストック機能の導入
  - 自分が投稿した情報と他者の投稿内容をストックする機能
- CircleCiの導入

<br />

## :books:見てほしいPOINT
2月6日〜3月8日までの30日間でPHPの勉強及びdockerの勉強・Laravelの勉強を行い、ポートフォリオ作成に移りました。
2月6日までは、Ruby・Railsの勉強を行っており初めて触る言語で作成いたしました。
スケジューリングとしては、以下の写真のとおりです。

|2月6日〜2月8日|2月9日〜15日|2月16日〜2月22日|
|:----------:|:----------------:|:------------:|
|![IMG_1756](https://user-images.githubusercontent.com/67353242/110265464-fbed8480-7ffe-11eb-9bee-d149938c749e.jpeg)|![IMG_1757](https://user-images.githubusercontent.com/67353242/110265478-00b23880-7fff-11eb-9394-df861ecd8ec4.jpeg)|![IMG_1758](https://user-images.githubusercontent.com/67353242/110265493-060f8300-7fff-11eb-8c73-3e92cb26f314.jpeg)|

|2月23〜3月1日|3月2日〜8日|
|:------------:|:------------:|
|![IMG_1759](https://user-images.githubusercontent.com/67353242/110265449-f1cb8600-7ffe-11eb-9e5f-8c548de0211f.jpeg)|![IMG_1760](https://user-images.githubusercontent.com/67353242/110265925-0f4d1f80-8000-11eb-986d-e616a02d0b1c.jpeg)|

- PHP基礎勉強に費やした時間：31時間11分（2月6日〜2月11日）
- Docker勉強に費やした時間：8時間10分(2月7・11・12日)
- Laravel基礎勉強（動画見ながらのハンズオン）に費やした時間：31時間24分(2月11〜18日)
- ErrorStocker作成に費やした時間：111時間4分(2月18日〜3月8日)
- 合計時間：183時間
