const events = require('events'),
    eventEmitter = new events.EventEmitter();

eventEmitter.setMaxListeners(11);

eventEmitter.on('breakTime', () => {
    console.log('Time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.on('breakTime', () => {
    console.log('Really time for a break');
});

eventEmitter.emit('breakTime');

setTimeout(() => {
    eventEmitter.emit('Tzeitz');
}, 2000);

eventEmitter.on('Tzeitz', () => {
    console.log('Time for maariv');
});