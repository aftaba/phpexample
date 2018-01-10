import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {HttpModule } from '@angular/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { FetchComponent } from './fetch/fetch.component';
import { AddComponent } from './add/add.component';
import{RouterModule} from '@angular/router';


@NgModule({
  declarations: [
    AppComponent,
    FetchComponent,
    AddComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,
    RouterModule.forRoot([{
      path:'add',
      component :AddComponent


    }] ),
    RouterModule.forRoot([{
      path:'update',
      component :FetchComponent


    }] ),
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
