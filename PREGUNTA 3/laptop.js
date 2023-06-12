/************************************************* VARIABLES *****************************************/
var camara, escenario, Render;
var camaraControl;
var clock = new THREE.Clock();
var ambienteLight, light;
var figura; 
/************************************************* FUNCIONES *****************************************/


/************************************************* FUNCION INICIO *****************************************/
function inicio(){
	var canvasWidth = window.innerWidth * 0.9;
	var canvasHeight = window.innerHeight * 0.9;

	// CAMARA
	camara = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 80000);
	camara.position.set(-1,1,110);
    //camara.position.set(-1,1,100);
	camara.lookAt(0,0,0);

	// LIGHTS
	light = new THREE.DirectionalLight(0xFFFFFF, 0.7);
	light.position.set( 1, 1, 1);
	light.target.position.set(0, 0, 0);
	light.target.updateMatrixWorld();
    ambienteLight = new THREE.AmbientLight(0x111111);


	//RENDERIZADO
	Render = new THREE.WebGLRenderer({antialias: true });
	Render.setSize(canvasWidth, canvasHeight);
	Render.setClearColor(0x050606, 1.0);
	Render.gammaInput = true;
	Render.gammaOutput = true;
    

	//ADICIONAR AL CONTENEDOR DEL DIV EN EL HTML
	var container = document.getElementById('container');
	container.appendChild(Render.domElement);


	//CONTROL DEL MOUSE
	camaraControl = new THREE.OrbitControls(camara, Render.domElement);
	camaraControl.target.set(0, 0, 0);
    

    const grupo = new THREE.Group(); 
     

    //CARGAR NUEVO MODELO 1
    estructura_teclado();
    grupo.add(figura);

  
    //CARGAR NUEVO MODELO 2
    arriba_teclado();
    grupo.add(figura);
      

    //CARGAR NUEVO MODELO 3
    estructura_pantalla();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 4
    frente_pantalla();
    grupo.add(figura);
    

    //CARGAR NUEVO MODELO 5
    atras_pantalla();
    grupo.add(figura);
     
     
    //CARGAR NUEVO MODELO 6
    var x = 2;
    for (let i = 0; i < 16; i++) {
        teclas_Fila1(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 7
    x = 2;
    for (let i = 0; i < 13; i++) {
        teclas_Fila2(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 8
    teclas_Fila2_retroceso();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 9
    teclas_Fila3_tab();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 10
    x = 7;
    for (let i = 0; i < 12; i++) {
        teclas_Fila3(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 11
    teclas_Fila3_enter();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 12
    teclas_Fila4_bloqMayus();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 13
    x = 11;
    for (let i = 0; i < 13; i++) {
        teclas_Fila4(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 14
    teclas_Fila5_shif1();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 15
    x = 9;
    for (let i = 0; i < 11; i++) {
        teclas_Fila5(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 16
    teclas_Fila5_shif2();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 17
    teclas_Fila6_control();
    grupo.add(figura);
    

    //CARGAR NUEVO MODELO 18
    x = 8;
    for (let i = 0; i < 3; i++) {
        teclas_Fila6(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 19
    teclas_Fila6_espacio();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 20
    x = 34;
    for (let i = 0; i < 5; i++) {
        teclas_Fila6(x);
        grupo.add(figura);
        x = x + 3;
    }


    //CARGAR NUEVO MODELO 21
    estructura_mouse();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 21
    mouse_izquierda();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 22
    mouse_derecha();
    grupo.add(figura);


    //CARGAR NUEVO MODELO 23
    frenteInterno_pantalla();
    grupo.add(figura);









    //ESCENARIO (agregamos la particula al escenario)
    escenario = new THREE.Scene();
    escenario.add(light);
    escenario.add(ambienteLight);
    escenario.add(grupo);      
        
}




function estructura_teclado(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [
        //teclado abajo
        [1, 1,  0],//0 
        [50, 1, 0],
        [50, 28,0],
        [1, 28, 0], 
        [1, 1,  0],

        //teclado lateral inferior
        [1, 1,  0],//5
        [50, 1, 0], 
        [50, 1, 1], 
        [1, 1,  1], 
        [1, 1,  0],

        //teclado lateral derecho
        [50, 1,  0], //10
        [50, 28, 0], 
        [50, 28, 1], 
        [50, 1,  1], 
        [50, 1,  0],

        //teclado lateral superior
        [50, 28, 0],//15
        [50, 28, 1], 
        [1,  28, 1], 
        [1,  28, 0], 
        [50, 28, 0], 
        
        //teclado lateral izquierdo
        [1, 28, 0], //20
        [1, 1,  0], 
        [1, 1,  1], 
        [1, 28, 1],
        [1, 28, 0],
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        //Agregamos vertices al vector
        vector = new THREE.Vector3(x,y,z);
        //Agregamos el vector a la geometria
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    //teclado abajo
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    //teclado lateral inferior
    miGeometria.faces.push(new THREE.Face3(5, 6, 7));
    miGeometria.faces.push(new THREE.Face3(7, 8, 9));
    miGeometria.faces.push(new THREE.Face3(9, 8, 7));
    miGeometria.faces.push(new THREE.Face3(7, 6, 5));
    //teclado lateral derecho
    miGeometria.faces.push(new THREE.Face3(10, 11, 12));
    miGeometria.faces.push(new THREE.Face3(12, 13, 14));
    miGeometria.faces.push(new THREE.Face3(14, 13, 12));
    miGeometria.faces.push(new THREE.Face3(12, 11, 10));
    //teclado lateral superior
    miGeometria.faces.push(new THREE.Face3(15, 16, 17));
    miGeometria.faces.push(new THREE.Face3(17, 18, 19));
    miGeometria.faces.push(new THREE.Face3(19, 18, 17));
    miGeometria.faces.push(new THREE.Face3(17, 16, 15));
    //teclado lateral izquierdo
    miGeometria.faces.push(new THREE.Face3(20, 21, 22));
    miGeometria.faces.push(new THREE.Face3(22, 23, 24));
    miGeometria.faces.push(new THREE.Face3(24, 23, 22));
    miGeometria.faces.push(new THREE.Face3(22, 21, 20));

    //MATERIAL 
    //(agregamos un material para que el punto tenga color) 
    var material = new THREE.MeshBasicMaterial({color: 0x111111});
    
    //OBJETO 
    //(creamos una figura - objeto con la geometria y el material)
    var miObjeto = new THREE.Mesh(miGeometria, material);
    figura = miObjeto;       
}


function arriba_teclado(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    //teclado arriba
    var vertices = [
        [1, 1, 1], 
        [50, 1, 1], 
        [50, 28, 1],
        [1, 28, 1], 
        [1, 1, 1],
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));    

    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x919191}); 
    
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material);
    figura = miObjeto;       
}


function estructura_pantalla(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        //pantalla lateral inferior
        [50, 28, 1], //0
        [50, 28.5, 1], 
        [1, 28.5, 1], 
        [1, 28, 1], 
        [50, 28, 1], 

        //pantalla lateral izquierdo
        [1, 28, 1],//5
        [1, 28.5, 1], 
        [1, 28.5, 25], 
        [1, 28, 25], 
        [1, 28, 1], 

        //pantalla lateral superior
        [1, 28, 25], //10
        [1, 28.5, 25], 
        [50, 28.5, 25], 
        [50, 28, 25],
        [1, 28, 25],
        
        //pantalla lateral derecho
        [50, 28, 25], //15
        [50, 28, 1], 
        [50, 28.5, 1],
        [50, 28.5, 25],
        [50, 28, 25],
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    //pantalla lateral inferior
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    //pantalla lateral izquierdo
    miGeometria.faces.push(new THREE.Face3(5, 6, 7));
    miGeometria.faces.push(new THREE.Face3(7, 8, 9));
    miGeometria.faces.push(new THREE.Face3(9, 8, 7));
    miGeometria.faces.push(new THREE.Face3(7, 6, 5));
    //pantalla lateral superior
    miGeometria.faces.push(new THREE.Face3(10, 11, 12));
    miGeometria.faces.push(new THREE.Face3(12, 13, 14));
    miGeometria.faces.push(new THREE.Face3(14, 13, 12));
    miGeometria.faces.push(new THREE.Face3(12, 11, 10));
    //pantalla lateral derecho
    miGeometria.faces.push(new THREE.Face3(15, 16, 17));
    miGeometria.faces.push(new THREE.Face3(17, 18, 19));
    miGeometria.faces.push(new THREE.Face3(19, 18, 17));
    miGeometria.faces.push(new THREE.Face3(17, 16, 15));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x111111});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function frente_pantalla(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [1, 28, 25], 
        [50, 28, 25], 
        [50, 28, 1],
        [1, 28, 1], 
        [1, 28, 25],
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x050505});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function frenteInterno_pantalla(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [2,  27.9, 24], //z = altura
        [49, 27.9, 24], // z = altura
        [49, 27.9, 4],//z = subida del plano
        [2,  27.9, 4], //z = subida del plano
        [2,  27.9, 24],
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x6BABF3});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function atras_pantalla(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [1, 28.5, 25],
        [50, 28.5, 25],
        [50, 28.5, 1],
        [1, 28.5, 1],
        [1, 28.5, 25], 
    ];

    for (i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x575656});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila1(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,   26, 2],
        [x+2, 26, 2],
        [x+2, 27, 2],
        [x,   27, 2],
        [x,   26, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila2(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,  23, 2],
        [x+2,23, 2],
        [x+2,25, 2],
        [x,  25, 2],
        [x,  23, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila2_retroceso(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [41, 23, 2],
        [49, 23, 2],
        [49, 25, 2],
        [41, 25, 2],
        [41, 23, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila3_tab(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [2, 20, 2],
        [6, 20, 2],
        [6, 22, 2],
        [2, 22, 2],
        [2, 20, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila3(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,   20, 2],
        [x+2, 20, 2],
        [x+2, 22, 2],
        [x,   22, 2],
        [x,   20, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila3_enter(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [43, 20, 2],
        [49, 20, 2],
        [49, 22, 2],
        [43, 22, 2],
        [43, 20, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila4_bloqMayus(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [2,  17, 2],
        [10, 17, 2],
        [10, 19, 2],
        [2,  19, 2],
        [2,  17, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila4(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,   17, 2],
        [x+2, 17, 2],
        [x+2, 19, 2],
        [x,   19, 2],
        [x,   17, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila5_shif1(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [2, 14, 2],
        [8, 14, 2],
        [8, 16, 2],
        [2, 16, 2],
        [2, 14, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila5(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,   14, 2],
        [x+2, 14, 2],
        [x+2, 16, 2],
        [x,   16, 2],
        [x,   14, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila5_shif2(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [42, 14, 2],
        [49, 14, 2],
        [49, 16, 2],
        [42, 16, 2],
        [42, 14, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila6_control(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [2, 11, 2],
        [7, 11, 2],
        [7, 13, 2],
        [2, 13, 2],
        [2, 11, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila6(x){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [x,   11, 2],
        [x+2, 11, 2],
        [x+2, 13, 2],
        [x,   13, 2],
        [x,   11, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function teclas_Fila6_espacio(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [17, 11, 2],
        [33, 11, 2],
        [33, 13, 2],
        [17, 13, 2],
        [17, 11, 2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x000000});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function estructura_mouse(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [17, 2,  2],
        [33, 2,  2],
        [33, 10, 2],
        [17, 10, 2],
        [17, 2,  2],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x101010});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function mouse_derecha(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [25, 2.3, 2.1],
        [32.5, 2.3, 2.1],
        [32.5, 4.5, 2.1],
        [25, 4.5, 2.1],
        [25, 2.3, 2.1],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x333333});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}


function mouse_izquierda(){
    //GEOMETRIA
    var miGeometria = new THREE.Geometry();
    
    var vertices = [  
        [17.3, 2.3, 2.1],
        [24.5, 2.3, 2.1],
        [24.5, 4.5, 2.1],
        [17.3, 4.5, 2.1],
        [17.3, 2.3, 2.1],
    ];

    for (let i = 0; i < vertices.length; i++) {
        x = vertices[i][0];
        y = vertices[i][1];
        z = vertices[i][2];
        vector = new THREE.Vector3(x,y,z);
        miGeometria.vertices.push(vector);
    }

    //PINTAR DE COLOR LA GEOMETRIA
    miGeometria.faces.push(new THREE.Face3(0, 1, 2));
    miGeometria.faces.push(new THREE.Face3(2, 3, 4));
    miGeometria.faces.push(new THREE.Face3(4, 3, 2));
    miGeometria.faces.push(new THREE.Face3(2, 1, 0));
    
    //MATERIAL 
    var material = new THREE.MeshBasicMaterial({color: 0x333333});
   
    //OBJETO 
    var miObjeto = new THREE.Mesh(miGeometria, material); 
    figura = miObjeto;
}












function animacion() {
	window.requestAnimationFrame(animacion);
	render_modelo();
}

function render_modelo() {
	var delta = clock.getDelta();
	camaraControl.update(delta);
	Render.render(escenario, camara);
}

/************************************************* MAIN *****************************************/

try {
	inicio();
	animacion();
} 
catch(e) {
	var errorReport = "Your program encountered an unrecoverable error, can not draw on canvas. Error was:<br/><br/>";
	$('#container').append(errorReport+e);
}
