//this function is extremely difficult to understand.
//because of this you may want to copy pasta the code, however it is not recommended
//to do so before reading and understand what it is doing.
//I have made it as simple as possible to see it loading a texture, scaling it to needed size
//and applying it to video memory.
GLuint loadtexture(char file[256]){
	GLuint texnum;//this will be our return value for our texture.
	void *raw;//this is our data after being decompressed and resized
	int w,h,bpp;//the width, height, and bits per pixel of our original image
	int texres=1;//the end resolution that gets and duplicates all pixels of the image and conforming to 2^x resolution.
	int widestside=0;//the widestside to compare our texres against.
	SDL_Surface *sdlimage;//this is our image being opened by SDLimage to be processed.
	Uint8 *srcpix,*dstpix;//set out destinate and source pixel pointers, these will be filters basically to convert the date into Uint8
	Uint32 truePixel;//this is the pixel after it's processing algorithm to be passed onto dstpix
	
	sdlimage=IMG_Load(file);//now! Let's open our file!
	if (!sdlimage){
		printf("Hey, where's the texture you want me to load!\n");
		return 0;
	}//return 0 if nothing to be opened.
	bpp = sdlimage->format->BytesPerPixel;//get how many bits per pixel we're using
	if (bpp < 2 || bpp > 4) {//if it's invalid return with an error message.
        SDL_FreeSurface(sdlimage);//close our image for reading.
		printf("VideoDriver::LoadSurface passed SDL_Surface * has an unusable bpp.\n");
		return 0;
	}
	w=sdlimage->w;
	h=sdlimage->h;
	if (w>h){//this'll determine the wider side of the image
		widestside=w;
	}else{//other wise it's the height :)
	    widestside=h;
	}
	//now we'll multiply our texture resolution by 2 until it's larger than the loading image.
	while(texres<w){
		texres*=2;
	}
	//we need to dynamicly create data at the size of our texture with 4 bytes.
    raw = (void *)malloc(texres*texres * 4);
	dstpix=(Uint8 *)raw;//point our destination pixel to our final raw data.

	//lock the surface so it does not explode while we are reading from it.
	SDL_LockSurface(sdlimage);//locked.
	//this is where we begin to load in the data, as you can see from the loop some funky monkey magic happens
	//you may never want to touch this logic loop or you may fubar your entire project. It's not to
	//be considered a black box, but there's probably just no better way to load in a texture.
	for (int i=texres-1;i>=0;i--){//start from the top left corner
	    for (int j=0;j<w;j++){//work our way right.
	        //let's check to see if our data is inside the image we want to use.
	        if (i*(h/texres) >= sdlimage->h || j*(w/texres) >= sdlimage->w) {//you will notice from the math in this line this is how the scaling is done. it's basically rounding to the nearest pixel and doing a nearest neighbor conversion.
				//if not let's make sure it's transparent to not blow something up.
				memset(dstpix, 0, 4);
			}else{
				//if it is, then let's convert it's pixel to something usable.
				//you'll notice the same algorithm is used for scaling the image.
				srcpix = (Uint8 *)sdlimage->pixels + (i*h/texres) * sdlimage->pitch + (j*w/texres) * bpp;
				//now let's decide what to do with it by the bpp:
                switch(bpp){
					//if it's 2 bytes per pixel, then let's just grab the pixel in
					case 2:
						//we only need to pass our src pix casted in Uint16
						truePixel=*(Uint16 *)srcpix;
						break;
					case 3:
						//we need to logical swap the bytes if we are using Big Endian (if you are on a mac)
						if (SDL_BYTEORDER == SDL_BIG_ENDIAN) {
							truePixel = srcpix[0] << 16 | srcpix[1]<<8 | srcpix[2];
						}else{
							//other wise let's just bit shift it a bit and pass it through.
							truePixel= srcpix[0] | srcpix[1]<<8 | srcpix[2] << 16;
						}
						break;
					case 4:
						//if true color, hehe, this is the easiest, just convert it straight to Uint32.
						truePixel= *(Uint32 *)srcpix;
						break;
				}
				//let's use SDL_GetRGBA to get the RGBA ordered representation of our data and pass it to our dstPix
				SDL_GetRGBA(truePixel, sdlimage->format, &(dstpix[0]), &(dstpix[1]), & (dstpix[2]), &(dstpix[3]));
			}
			dstpix+=4;
	    }
	}
	SDL_UnlockSurface(sdlimage);//unlocking it before deleting it.
	SDL_FreeSurface(sdlimage);//close our image for reading since we're done with it.
    //Now that we have our raw prepared data, let's take that data and put it into a texture.
    //this parts actually fairly easy. Just takes a bit to understand what bind_texture is actually doing.
    //now lets tell OpenGl we're allocating a texture:
   	glGenTextures(1, &texnum);//the reason we pass the address to it, is because the folks who wrote open gl likes passing by reference and reserves return calls as error messages.
	//a quick check to see if we've run out of memory, not necessary, but still good to do.
   	int errorCode = glGetError();
	if (errorCode != 0) {
		glDeleteTextures(1, &texnum);
		free(raw);
		if (errorCode == GL_OUT_OF_MEMORY) {
			printf("Out of Memory...\n");
			appisrunning=false;return 0;//quit and return nothing.
		} else {
			printf("An Error has occured:%i.\n",errorCode);
			appisrunning=false;return 0;//quit and return nothing.
		}
	}
	//now that we allocated the info, let's move it into our texture.
	//what binding a texture does is basically sets your working texture, let's set it to our texnum
   	glBindTexture(GL_TEXTURE_2D, texnum);
   	//let's clamp the texture, this is not to be used if you want your texture to repeat across a surface, just simply delete this line if you don't want it.
	glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_WRAP_S, GL_CLAMP);
	glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_WRAP_T, GL_CLAMP);
	//we can use either GL_LINEAR for bilear filtering or GL_NEAREST for sharp textures.
	glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_MIN_FILTER, GL_LINEAR);
	glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_MAG_FILTER, GL_LINEAR);
	//use this next line to generate a non mipmapped interlaced texture, this will look very sharp.
	glTexImage2D(GL_TEXTURE_2D, 0, 4, texres, texres, 0, GL_RGBA, GL_UNSIGNED_BYTE, (Uint8 *)raw);
	//if you'd like to generate mipmaps instead comment the last line out and use the next line
	//you will also need to turn thing like GL_LINEAR to GL_MIPMAP_LINEAR.
	//gluBuild2DMipmaps( GL_TEXTURE_2D, 4, width, h, GL_RGBA, GL_UNSIGNED_BYTE, (Uint8 *)raw);
    //and now we clean up our memory and free what we allocated.
    free(raw);
    //Here we return the texture number so we can use it, and...
	return texnum;
	//ALL DONE! Not so hard really, was it?
}
