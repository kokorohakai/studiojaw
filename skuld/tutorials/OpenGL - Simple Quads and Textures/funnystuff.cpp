void funnystuff(){
	//set our data we'll be using
	static int cuberotate=0;
	static GLuint texture[3]={0,0};
	if (texture[0]==0)
	    texture[0]=loadtexture("walltest.png");
	if (texture[1]==0)
	    texture[1]=loadtexture("test.png");
	int fakelight[3]={255,255,255};
	static int frames;
	static bool petalsloaded=false;
	const int PETALS=500;
	static int petalparams[PETALS][7];
	if (!petalsloaded){
        srand(time(0));
		for (int a=0;a<PETALS;a++){
			petalparams[a][0]=int( (rand()*500)/RAND_MAX )+100;//distance
			petalparams[a][1]=int( (rand()*10)/RAND_MAX )+2;//speed
			petalparams[a][2]=(900-int( (double(a)/double(PETALS)) * 800.0 ));//z-depth
			petalparams[a][3]=int( (rand()*360)/RAND_MAX );//angle x
        	petalparams[a][4]=int( (rand()*360)/RAND_MAX );//angle y
			petalparams[a][5]=int( (rand()*360)/RAND_MAX );//angle z
			petalparams[a][6]=int( (rand()*360)/RAND_MAX );//tunnel step
		}
		petalsloaded=true;
	}

	//manipulate our data
	cuberotate++;
	for (int a=0;a<PETALS;a++){
		//petalparams[a][3]++;
		//petalparams[a][4]++;
		petalparams[a][5]+=5;
		petalparams[a][6]++;
	}
	//by request, I'm drawing a cube
	draw_cube(0,0,900,30,30,30,fakelight[0],fakelight[1],fakelight[2],255,cuberotate,cuberotate/2,0,texture[0]);
	//now draw our creation
	draw_quad(0,0,900,497,373,fakelight[0],fakelight[1],fakelight[2],255,0,0,0,texture[0]);
	for (int a=0;a<PETALS;a++){
	  	draw_quad(int(petalparams[a][0]*cos((double(petalparams[a][6]*petalparams[a][1])/5.0)*.017)),
				  int(petalparams[a][0]*sin((double(petalparams[a][6]*petalparams[a][1])/5.0)*.017)),
		petalparams[a][2],
		30,30,fakelight[0],fakelight[1],fakelight[2],255,
		petalparams[a][3],petalparams[a][4],petalparams[a][5],texture[1]);
	}
}
