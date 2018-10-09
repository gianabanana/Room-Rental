#ifndef POPUPEDITBOARDERSAVE_H
#define POPUPEDITBOARDERSAVE_H

#include <QWidget>

namespace Ui {
class PopUpEditBoarderSave;
}

class PopUpEditBoarderSave : public QWidget
{
    Q_OBJECT

public:
    explicit PopUpEditBoarderSave(QWidget *parent = 0);
    ~PopUpEditBoarderSave();

private slots:
    void on_pushButton_clicked();

private:
    Ui::PopUpEditBoarderSave *ui;
};

#endif // POPUPEDITBOARDERSAVE_H
