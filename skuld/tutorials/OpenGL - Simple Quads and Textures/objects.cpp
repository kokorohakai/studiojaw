void draw_quad(int x,int y, int z, int xs, int ys, int r, int g, int b, int a, int xr, int yr, int zr, int texturenumber){
    //here we create the color we'll by using, notice it's a 4 byte array, this is typical for Opengl colors.
	GLubyte color[]={r,g,b,a};//if you don't know what alpha is, we'll just sum it up to transparency, 255 is totally opaque and 0 is invisible.
	//the next will be our basic Verticies of a quad, in this case we draw a perfect square.
    static GLdouble v0[]	= { -1, -1,   0.0};//verticy 1
	static GLdouble v1[]	= {  1, -1,   0.0};//2
	static GLdouble v2[]	= {  1,  1,   0.0};//3
	static GLdouble v3[]	= { -1,  1,   0.0};//4, they do have to be in this order for simplicity sake and for cull face.
	//glPushMatrix() basically pushes your coordinates in a new matrix, to put it in english this means
	//anything you do to the world coordinates will only happen before the pop matrix.
   	glPushMatrix();
   	    //move our coordinate system to the location we'll be drawing.
   	    glTranslated(-double(x),-double(y),-double(z));//there was no need to pass in doubles from our draw quad function for this example.
   	    //rotate amongst z, y, then x.  The reason this is backwards is to create a proper rotational look.
		glRotated(zr,0,0,1);//move zr degrees at scale of x=0;y=0;z=1
		glRotated(yr,0,1,0);
		glRotated(xr,1,0,0);
		//now we make our quad the size we passed it in on:
		glScaled(xs,ys,1);
		//Here we bind the texture at number (texturenumber) to the current quad being drawn.
		glBindTexture(GL_TEXTURE_2D, texturenumber);
		//let's enable blending if we use any alpha
		glEnable(GL_BLEND);
		//and no we start drawing our quad:
		glBegin( GL_QUADS );//see www.opengl.org for things you can 'begin' this probably one of the most powerful commands in openGL
			//let's draw our first verticy
			//first let's match our texture verticy to our quad's verticy
			glTexCoord2d( 0,0 );
			//then let's apply the color to blend the texture with
			glColor4ubv( color );
			//then plot the verticy
	    	glVertex3dv( v0 );
	    	//wash rinse repeat with the next three verticies
			glTexCoord2d( 1,0 );
			glColor4ubv( color );
			glVertex3dv( v1 );
			glTexCoord2d( 1,1 );
			glColor4ubv( color );
			glVertex3dv( v2 );
			glTexCoord2d( 0,1 );
			glColor4ubv( color );
			glVertex3dv( v3 );
		//end what we began
		glEnd();
	//disable what we enabled
	glDisable(GL_BLEND);
	//and reset to the default empty texture
	glBindTexture(GL_TEXTURE_2D, 0);
   	glPopMatrix();//come back from our previous matrix and return to our last coordinate system.
}

void draw_cube(int x,int y, int z, int xs, int ys, int zs, int r, int g, int b, int a, int xr, int yr, int zr, int texturenumber){
    //here we create the color we'll by using, notice it's a 4 byte array, this is typical for Opengl colors.
	GLubyte color[]={r,g,b,a};//if you don't know what alpha is, we'll just sum it up to transparency, 255 is totally opaque and 0 is invisible.
	//the next will be our basic Verticies of a quad, in this case we draw a perfect square.
    static GLdouble v00[]	= { -1, -1, -1};//verticy 1
	static GLdouble v01[]	= {  1, -1, -1};//2
	static GLdouble v02[]	= {  1,  1, -1};//3
	static GLdouble v03[]	= { -1,  1, -1};//4, they do have to be in this order for simplicity sake and for cull face.

    static GLdouble v10[]	= { -1, -1, 1};//verticy 1
	static GLdouble v11[]	= {  1, -1, 1};//2
	static GLdouble v12[]	= {  1,  1, 1};//3
	static GLdouble v13[]	= { -1,  1, 1};//4, they do have to be in this order for simplicity sake and for cull face.

    static GLdouble v20[]	= { -1,  1,  1};//verticy 1
	static GLdouble v21[]	= {  1,  1,  1};//2
	static GLdouble v22[]	= {  1,  1, -1};//3
	static GLdouble v23[]	= { -1,  1, -1};//4, they do have to be in this order for simplicity sake and for cull face.

    static GLdouble v30[]	= { -1, -1,  1};//verticy 1
	static GLdouble v31[]	= {  1, -1,  1};//2
	static GLdouble v32[]	= {  1, -1, -1};//3
	static GLdouble v33[]	= { -1, -1, -1};//4, they do have to be in this order for simplicity sake and for cull face.

    static GLdouble v40[]	= { -1, -1, -1};//verticy 1
	static GLdouble v41[]	= { -1, -1,  1};//2
	static GLdouble v42[]	= { -1,  1,  1};//3
	static GLdouble v43[]	= { -1,  1, -1};//4, they do have to be in this order for simplicity sake and for cull face.

    static GLdouble v50[]	= {  1, -1, -1};//verticy 1
	static GLdouble v51[]	= {  1, -1,  1};//2
	static GLdouble v52[]	= {  1,  1,  1};//3
	static GLdouble v53[]	= {  1,  1, -1};//4, they do have to be in this order for simplicity sake and for cull face.
	//glPushMatrix() basically pushes your coordinates in a new matrix, to put it in english this means
	//anything you do to the world coordinates will only happen before the pop matrix.
   	glPushMatrix();
   	    //move our coordinate system to the location we'll be drawing.
   	    glTranslated(-double(x),-double(y),-double(z));//there was no need to pass in doubles from our draw quad function for this example.
   	    //rotate amongst z, y, then x.  The reason this is backwards is to create a proper rotational look.
		glRotated(zr,0,0,1);//move zr degrees at scale of x=0;y=0;z=1
		glRotated(yr,0,1,0);
		glRotated(xr,1,0,0);
		//now we make our quad the size we passed it in on:
		glScaled(xs,ys,zs);
		//Here we bind the texture at number (texturenumber) to the current quad being drawn.
		glBindTexture(GL_TEXTURE_2D, texturenumber);
		//let's enable blending if we use any alpha
		glEnable(GL_BLEND);
		//and no we start drawing our quad:
		glBegin( GL_QUADS );//see www.opengl.org for things you can 'begin' this probably one of the most powerful commands in openGL
			//let's draw our first verticy
			//first let's match our texture verticy to our quad's verticy
			glTexCoord2d( 0,0 );
			//then let's apply the color to blend the texture with
			glColor4ubv( color );
			//then plot the verticy
	    	glVertex3dv( v00 );
	    	//wash rinse repeat with the next three verticies
			glTexCoord2d( 1,0 );
			glVertex3dv( v01 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v02 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v03 );
			//the other sides
			glTexCoord2d( 0,0 );
	    	glVertex3dv( v10 );
			glTexCoord2d( 1,0 );
			glVertex3dv( v11 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v12 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v13 );
			glTexCoord2d( 0,0 );
	    	glVertex3dv( v20 );
			glTexCoord2d( 1,0 );
			glVertex3dv( v21 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v22 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v23 );
			glTexCoord2d( 0,0 );
	    	glVertex3dv( v30 );
			glTexCoord2d( 1,0 );
			glVertex3dv( v31 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v32 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v33 );
			glTexCoord2d( 0,0 );
	    	glVertex3dv( v40 );
			glTexCoord2d( 1,0 );
			glVertex3dv( v41 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v42 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v43 );
			glTexCoord2d( 0,0 );
	    	glVertex3dv( v50 );
			glTexCoord2d( 1,0 );
			glVertex3dv( v51 );
			glTexCoord2d( 1,1 );
			glVertex3dv( v52 );
			glTexCoord2d( 0,1 );
			glVertex3dv( v53 );
		//end what we began
		glEnd();
	//disable what we enabled
	glDisable(GL_BLEND);
	//and reset to the default empty texture
	glBindTexture(GL_TEXTURE_2D, 0);
   	glPopMatrix();//come back from our previous matrix and return to our last coordinate system.
}
