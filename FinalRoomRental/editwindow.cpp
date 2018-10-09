#include "editwindow.h"
#include "ui_editwindow.h"
#include "rents.h"

EditWindow::EditWindow(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::EditWindow)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/bbb");
    ui->label_2->setPixmap(pix);
    loadDatabase();
    db=QSqlDatabase::database();
}

EditWindow::~EditWindow()
{
    delete ui;
}

void EditWindow::loadDatabase()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("addboarder");
    model->select();
    qDebug()<<model->lastError();
    ui->tableView->setModel(model);
    ui->tableView->setColumnWidth(2, 84);
    ui->tableView->setColumnWidth(4, 66);
    ui->tableView->setColumnWidth(7, 66);
    ui->tableView->setColumnWidth(11, 53);
    ui->tableView->hideColumn(0);
    ui->tableView->hideColumn(1);
    ui->tableView->hideColumn(3);
    ui->tableView->hideColumn(5);
    ui->tableView->hideColumn(6);
    ui->tableView->hideColumn(8);
    ui->tableView->hideColumn(9);
    ui->tableView->hideColumn(10);
    ui->tableView->hideColumn(12);
    ui->tableView->hideColumn(13);
}

void EditWindow::on_search_clicked()
{
    QSqlTableModel *model=new QSqlTableModel();
    QSqlQuery query;

    if(ui->radioButtonFirstName->isChecked()==true){
        model->setTable("addboarder");
        ui->tableView->hideColumn(12);
        ui->tableView->hideColumn(13);
        QString input=ui->lineEdit->text();
        QString begin="FirstName='";
        QString end="'";
        begin.append(input);
        begin.append(end);
        model->setFilter(begin);
    } else if(ui->radioButtonLastName->isChecked()==true){
        model->setTable("addboarder");
        ui->tableView->hideColumn(12);
        ui->tableView->hideColumn(13);
        QString input=ui->lineEdit->text();
        QString begin="LastName='";
        QString end="'";
        begin.append(input);
        begin.append(end);
        model->setFilter(begin);
    }
    qDebug()<<query.lastError();
    model->select();
    ui->tableView->setModel(model);
    int count=model->rowCount();
    QString  stringA= "Searching for '";
    QString searchQuery= ui->lineEdit->text();
    QString stringB="'...";
    stringA.append(searchQuery);
    stringA.append(stringB);
    ui->labelSearchingfor->setText(stringA);
    QString string= "There are ";
    QString results= QString::number(count);
    QString end=" result(s).";
    string.append(results);
    string.append(end);
    ui->labelThereare->setText(string);
}

void EditWindow::on_tableView_clicked(const QModelIndex &index)
{
    int row=index.row();
    eID=index.sibling(row, 0).data().toInt();
    qDebug()<<"eID:";
    qDebug()<<eID;

    EditWindow2 *editWin2=new EditWindow2(eID, db);
    this->hide();
    editWin2->show();
}

void EditWindow::on_cancel_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
