import express from 'express';
import { knex } from './knex';
import { session } from './session';

export const app = express();

app.use(express.static('.'));
app.use('/js', express.static('lib/browser'));
app.use(session);


app.get('/view/:roomId', function(req, res) {
    var roomId = '#' + req.params.roomId;

    var onError = function() {
        res.writeHead(500);
        res.end('500 Internal Server Error');
    };

    knex('rooms')
        .where('id', roomId)
        .whereNull('deleted')
        .then(function(room) {
            if (!room) return onError();

            knex('messages')
                .where('room_id', roomId)
                .whereNull('deleted')
                .then(
                    function(messages) {
                        var lines = messages.map(function(message) {
                            return `
                                <tr>
                                    <td>${message.name} @${message.user_id}</td>
                                    <td>${message.message.replace(/\t/g, ' ').replace(/\r?\n/g, '<br>')}</td>
                                    <td>${message.modified}</td>
                                </tr>
                                `;
                        });
                        var html = `
                            <!DOCTYPE html>
                            <html lang="ja">
                            <head>
                                <meta charset="UTF-8">
                                <title>${room.title}</title>
                            </head>
                            <body>
                                <table>
                                    <tbody>
                                        ${lines.join('\n')}
                                    </tbody>
                                </table>
                            </body>
                            </html>
                            `;
                        res.end(html);
                    }, onError);
        }, onError);
});
app.get('/view', function(req, res) {
    res.end('<script>location.href = location.hash.substr(1);</script>');
});