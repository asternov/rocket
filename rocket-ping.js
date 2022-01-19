const {driver} = require('@rocket.chat/sdk');
// customize the following with your server and BOT account information

const accounts = [{
    host: 'open.rocket.chat',
    user: 'asternov97',
    pass: 'kba333ap',
    ssl: true,
}, {
    host: 'hellochat.ru',
    user: 'andrey.ternovsky',
    pass: 'tehsKdfs12l',
    ssl: true,
}];

let i = process.argv[2] == 'test' ? 0 : 1;
var myuserid;
// this simple bot does not handle errors, different message types, server resets
// and other production situations

const runbot = async (acc) => {
    let checkTime = () => {
        if (new Date().getUTCHours() >= 16) {
            //process.exit(1);
        }
    }

    setInterval(checkTime, 5 * 1000);
    const conn = await driver.connect({host: acc.host, useSsl: acc.ssl})
    myuserid = await driver.login({username: acc.user, password: acc.pass});
    console.log('joined rooms ' + Date.now());
    const subscribed = await driver.subscribeToMessages();
    console.log('subscribed');

    let isWorkDay = new Date().getDay() <= 5;
    let isFirstMessage = false;
    if (isWorkDay && isFirstMessage) {
        await driver.sendToRoom('Доброе утро!', 'vea_dev');
        console.log('Greeting message sent');
    }
}

runbot(accounts[i]);


// callback for incoming messages filter and processing
const processMessages = async (err, message, messageOptions) => {

    const BOTNAME = '';  // name  bot response to
    if (!err) {
        // filter our own message
        if (message.u._id === myuserid) return;
        // can filter further based on message.rid
        const roomname = await driver.getRoomName(message.rid);
        if (message.msg.toLowerCase().startsWith(BOTNAME)) {
            const response = message.u.username +
                ', how can ' + BOTNAME + ' help you with ' +
                message.msg.substr(BOTNAME.length + 1);
            const sentmsg = await driver.sendToRoom(response, roomname);
        }
    }
}

