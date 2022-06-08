# subject-220608

[エビデンスの意味とは？類義語との違いや業界別の正しい使い方について解説](https://mynavi-agent.jp/dainishinsotsu/canvas/2021/05/post-484.html)

### Twitter 検索(自分のまわり)
```
filter:follows -filter:retweets -filter:replies
```

```js
var json = {
    "item": [
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界0",
            "name": "山田太郎0",
            "datetime": "2022\/06\/08 10:07:45"
        },
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界1",
            "name": "山田太郎1",
            "datetime": "2022\/06\/08 10:07:27"
        },
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界2",
            "name": "山田太郎2",
            "datetime": "2022\/06\/08 10:07:25"
        },
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界3",
            "name": "山田太郎3",
            "datetime": "2022\/06\/08 10:07:23"
        },
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界4",
            "name": "山田太郎4",
            "datetime": "2022\/06\/08 10:07:22"
        },
        {
            "text": "今日は\nいい天気だ\n梅雨はいつだ?",
            "subject": "こんにちは世界5",
            "name": "山田太郎5",
            "datetime": "2022\/06\/08 10:07:15"
        }
    ]
};
```

```js
    $("#test").on("click",function(){
        // console.log(json);
        // console.log(json.item);
        console.log(json.item[1]);
        console.log(json.item[1]);

        // alert( json.item[1].name + " : " + json.item[1].subject );
        // alert( json.item[1]["name"] + " : " + json.item[1]["subject"] );

        // alert( document.getElementById('test').value );
        // alert( $("#test").val() );

        console.log(document.getElementsByTagName('input'));
        alert( document.getElementsByTagName('input')[1].value  );
    });

```
