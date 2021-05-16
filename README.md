# Laravel 隨便試

## 這啥

漫無目的的 Laravel 專案，用來集中存放、展示各種小型設計，還有包含一點點 Laravel 教學。

這些小型設計可能只是個小齒輪，無法自成一個獨立作品，所以被整理在這個專案裡面。

## 如何收看內容

本專案的 commit 記錄有特別整理，線圖儘量保持簡單、不分岔。看看每個 commit 裡面的詳細訊息，再看看修改了什麼東西吧。

為了方便展示，線圖可能被 `push --force-with-lease` 指令整理。

## 內容有什麼重點

* [Transformer 模式](app/Transformers/BaseTransformer.php)：把一或多個 model 物件轉換成另外一種型態。有 [單元測試](tests/Unit/MailTransformerTest.php) 可參考。
* [model 的 PHPDoc](app/Models/Mail.php)：利用 [barryvdh/laravel-ide-helper](https://packagist.org/packages/barryvdh/laravel-ide-helper) 套件自動補充 model 的 PHPDoc，可讓編輯器幫你自動完成（autocomplete）model 的屬性或方法。
* [測試用入口](routes/api.php)：大部份功能都有寫在路由了，如果在本機安裝好，可以進入對應網址測試執行結果。
