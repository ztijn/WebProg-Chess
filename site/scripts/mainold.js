$(function() {
    print_latest_news();
    window.setInterval(function () {
        print_latest_news();
    }, 5000);
});

function print_latest_news() {
    let articles_html = $.post("scripts/read_latest_news.php", {call_now: "True"});
    let news_container = $('#news_container');
    articles_html.done(function (data) {
        news_container.empty();
        news_container.append(data.html);
        $('.article_remove').click(function () {
            removeArticle(this);
        });
    });
}

function removeArticle(rm_btn) {
    let article_id = $(rm_btn).attr('article-id');
    console.log(article_id);
    let rm_article = $.post("scripts/news_remove.php", {article_id: article_id});
    rm_article.done(function (data) {
        print_latest_news();
    });
}