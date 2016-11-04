var app = require('express')();
var server = require('http').Server(app);
var ios = require('socket.io')(server);
var notiroom;
var socket_ids;
var clients =[];

server.listen(3001);
console.log('server started');
ios.on('connection', function (socket) {
 
 socket.on('storeClientInfo', function (data) {
	   /*if(data.opponent == customId){
             socket.join(data.opponent);
	    }*/
	    console.log('new custom id : '+data.customId);
            var clientInfo = new Object();
            clientInfo.customId         = data.customId;
            clientInfo.clientId     = socket.id;
            clients.push(clientInfo);
  });

  socket.on('new chat', function (data) {
	
	var socket_ids=socket.id.substring(2,socket.id.length);
	console.log('socket : '+socket.id);
	console.log('data : '+data.u_num);
    for(var x=0, len=clients.length ; x<len ; x++){
	console.log('client : '+clients[x].customId);
	console.log('socketid : '+data.u_num);
    	if(clients[x].customId == data.opponent){
		notiroom = clients[x].clientId.substring(2,clients[x].clientId.length);
		//socket.broadcast.in(socket_ids).emit('new chat noti', {num : data.opponent});
                //socket.broadcast.in(notiroom).emit('new chat noti', {num : data.opponent});

		ios.emit('new chat noti', {num : data.opponent, u_num : data.u_num});
//		socket.emit('test');
//		console.log('send to :'+notiroom);
//		console.log('send to2 :'+socket_ids);
		break;
	}
    }
  });

  socket.on('disconnect', function (data) {

            for( var i=0, len=clients.length; i<len; ++i ){
                var c = clients[i];

                if(c.clientId == socket.id){
                    clients.splice(i,1);
                    break;
                }
            }

  });
});

