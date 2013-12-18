void sillystuff(){
	//set our data we'll be using
	static GLuint texture[2]={0,0};
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
			petalparams[a][0]=int( (rand()*800)/RAND_MAX )-400;
			petalparams[a][1]=int( (rand()*800)/RAND_MAX )-400;
			petalparams[a][2]=(900-int( (double(a)/double(PETALS)) * 800.0 ));
			petalparams[a][3]=int( (rand()*360)/RAND_MAX );
			petalparams[a][4]=int( (rand()*360)/RAND_MAX );
			petalparams[a][5]=int( (rand()*360)/RAND_MAX );
			petalparams[a][6]=int( (rand()*360)/RAND_MAX );
		}
		petalsloaded=true;
	}
	
	//manipulate our data
	for (int a=0;a<PETALS;a++){
		petalparams[a][1]++;
		if (petalparams[a][1]>400)
		petalparams[a][1]=-400;
		petalparams[a][3]++;
		petalparams[a][4]++;
		petalparams[a][5]++;
		petalparams[a][6]++;
	}
	
	
	//now draw our creation
	draw_quad(0,0,900,497,373,fakelight[0],fakelight[1],fakelight[2],255,0,0,0,texture[0]);
	for (int a=0;a<PETALS;a++){
       	draw_quad(petalparams[a][0]+int(100.0*cos(double(petalparams[a][6])*.017)),
			petalparams[a][1],petalparams[a][2],
		   30,30,fakelight[0],fakelight[1],fakelight[2],255,
		   petalparams[a][3],petalparams[a][4],petalparams[a][5],texture[1]);
	}
}
