let interval = setInterval(() => {
    let found = false;
    $('a.list-card').each(function() {
        if (!found) {
            let $elem = $(this);
            let text = $elem.children('.list-card-details').children('.list-card-title').text();
            if (text.indexOf('some rand') != -1) {
                $elem.children('.icon-edit').click();
                setTimeout(() => {
                    $('.js-archive').click();
                }, 200);
                found = true;
            }
        }
    });
}, 600);