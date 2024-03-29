import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';//template-driven forms, reactiveforms


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponentComponent } from './home-component/home-component.component';
import { JwtInterceptor } from './interceptors/jwt.interceptor';
import { Com1Component } from './_com1/_com1.component';
import { Com2Component } from './_com2/_com2.component';



@NgModule({
  declarations: [
    AppComponent,
    Com1Component,
    Com2Component,
    HomeComponentComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule, ReactiveFormsModule
  ],
  providers: [
    {provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor,multi: true}],
  bootstrap: [AppComponent]
})
export class AppModule { }
