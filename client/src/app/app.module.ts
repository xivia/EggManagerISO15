import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from "@angular/forms";

import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { EierListeComponent } from './eier-liste/eier-liste.component';
import { EierDetailComponent } from './eier-detail/eier-detail.component';
import { MatDialogModule } from '@angular/material/dialog';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

@NgModule({
  declarations: [
    AppComponent,
    EierListeComponent,
    EierDetailComponent
  ],
  entryComponents: [
    EierDetailComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    FormsModule,
    HttpClientModule,
    MatDialogModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { } 
