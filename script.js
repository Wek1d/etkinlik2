document.addEventListener('DOMContentLoaded', function () {
    // Sayfa yüklendiğinde bildirim izni iste
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }
});

function scrollDown() {
    // Etkinliğe git butonuna basıldığında sayfayı yavaşça aşağı kaydır
    let scrollInterval = setInterval(function () {
        window.scrollBy(0, 10);
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            clearInterval(scrollInterval);
        }
    }, 10);
}

function saveEvent() {
    // Etkinlik kaydetme işlemleri burada yapılacak
    // Bildirim gönderme işlemi de burada gerçekleştirilecek

    if (Notification.permission === "granted") {
        let notification = new Notification('Ugothic', {
            body: 'Etkinlik kaydedildi!',
        });
    }
}
